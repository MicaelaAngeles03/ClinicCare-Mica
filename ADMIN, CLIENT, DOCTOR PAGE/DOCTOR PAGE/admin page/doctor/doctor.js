$(document).ready(function(){
    dataTable = $("#doctor").DataTable({
        dom: 'Brtp',
        responsive: true,
        fixedHeader: true,
        pageLength: 5,
        buttons: [
            {
                extend: 'excelHtml5',
                text: 'Excel',
                classfirstname: 'border-white',
            },
            {
                extend: 'pdfHtml5',
                text: 'PDF',
                classfirstname: 'border-white p-3',
                download: 'open',
            }
        ],
        'columnDefs': [ {
            'targets': [2,3,4,5], /* column index */
            'orderable': false, /* true or false */
        }]
    });

    dataTable.buttons().container().appendTo($('#MyButtons'));

    var table = dataTable;
    var filter = createFilter(table, [1,2,3,4]);

    function createFilter(table, columns) {
        var input = $('input#keyword').on("keyup", function() {
            table.draw();
        });
        
        $.fn.dataTable.ext.search.push(function(
            settings,
            searchData,
            index,
            rowData,
            counter
        ) {
            var val = input.val().toLowerCase();
        
            for (var i = 0, ien = columns.length; i < ien; i++) {
                if (searchData[columns[i]].toLowerCase().indexOf(val) !== -1) {
                return true;
                }
            }
        
            return false;
        });
        
        return input;
    }

    $('select#doctor-description').on('change', function(e){
        var status = $(this).val();
        dataTable.columns([2]).search(status).draw();
    });

    

    $(document).on('submit', '#savedoctor', function (e) {
        e.preventDefault();
    
            var formData = new FormData(this);
            formData.append("save_doctor", true);

    
        $.ajax({
            type: "POST",
            url: "code.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                var res = $.parseJSON(response);
    
                $("#errorMessage").addClass('d-none');
    
                if (res.status == 422) {
                    $("#errorMessage").removeClass('d-none');
                    $("#errorMessage").text(res.message);
                } else if (res.status == 200) {
                    // Close the modal
                    $('#doctorAddModal').modal('hide');
    
                    // Reset the form
                    $('#savedoctor')[0].reset();
    
                    // Display success message
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success(res.message);
    
                    // Refresh or update the table data
                    $('#doctor').load(location.href + " #doctor");
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error("AJAX Error:", textStatus, errorThrown);
            }
        });
    });
    


    // Edit a doctor
    $(document).on('click', '.editdoctorBtn', function() {
        var doctor_id = $(this).val();
    
        $.ajax({
            type: "GET",
            url: "code.php?doctor_id=" + doctor_id,
            success: function(response) {
                var res = $.parseJSON(response);
    
                if (res.status == 404) {
                    alert(res.message);
                } else if (res.status == 200) {
                    // Assuming your gender select has an id of 'gender'
                    $('#doctor_id').val(res.data.id);
                    $('#description').val(res.data.description);
                    $('#password').val(res.data.password);
                    $('#firstname').val(res.data.firstname);
                    $('#middlename').val(res.data.middlename);
                    $('#lastname').val(res.data.lastname);
                    $('#birthdate').val(res.data.birthdate);
                    $('#email').val(res.data.email);
                    $('#contact_number').val(res.data.contact_number);
                    $("input[name='gender']").each(function() {
                        if ($(this).val() == res.data.gender) {
                            $(this).prop('checked', true);
                        }
                    });
                    $('#address').val(res.data.address);
                
    
                
                    var pictureText = $('#pictureText');
                    pictureText.val(res.data.picture);
    

                    $('#doctorEditModal').modal('show');
                    
                }
            }
        });
    });
    


    // Update a doctor
    $(document).on('submit', '#updatedoctor', function(e) {
    e.preventDefault();

    // Create FormData object
    var formData = new FormData(this);
    formData.append("update_doctor", true);

    $.ajax({
        type: "POST",
        url: "code.php",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            // You can use jQuery also
            var res = $.parseJSON(response);
            if (res.status == 422) {
                $("#errorMessageUpdate").removeClass('d-none');
                $("#errorMessageUpdate").text(res.message);
            } else if (res.status == 200) {
                $('#errorMessageUpdate').addClass('d-none');
                $('#doctorEditModal').modal('hide');
                $('#updatedoctor')[0].reset();

                alertify.set('notifier', 'position', 'top-center');
                alertify.success(res.message);

                // view table data without reloading the page
                $('#doctor').load(location.href + " #doctor");
            }
        },
    });
});

    // View a doctor
    $(document).on('click', '.viewdoctorBtn', function() {
        var doctor_id = $(this).val();
    
        $.ajax({
            type: "GET",
            url: "code.php?doctor_id=" + doctor_id,
            success: function(response) {
                var res = $.parseJSON(response);
    
                if (res.status == 404) {
                    alert(res.message);
                } else if (res.status == 200) {
                    // Concatenate first name, middle name, and last name
                    var fullName = '<div style="text-align: center; font-size:1.3em"><strong>' + res.data.firstname + '</strong> ' + 
                                   '<strong>' + res.data.middlename + '</strong> ' + 
                                   '<strong>' + res.data.lastname + '</strong></div>';
    
                    // Update modal content
                    $('#view_fullname').html(fullName);
                    $('#view_birthdate').text(res.data.birthdate);
                    $('#view_email').text(res.data.email);
                    $('#view_contact_number').text(res.data.contact_number);
                    $('#view_gender').text(res.data.gender);
                    $('#view_address').text(res.data.address);
                    $('#view_description').text(res.data.description);
                    $('#view_password').text(res.data.password);
                    
    
                    // Set image source
                    var viewPicture = $('#view_picture');
                    viewPicture.attr('src', res.data.picture);
    
                    // Set width and height
                    viewPicture.css({
                        'border-radius': '50%',
                        'width': '100x', // Set the desired width
                        'height': '100px' // Set the desired height
                    });
    
                    // Show the modal   
                    $('#doctorViewModal').modal('show');
                }
            }
        });
    });
    
    
    $(document).on('click', '.deletedoctorBtn', function(e) {
        e.preventDefault();
    
        var doctor_id = $(this).val();
        console.log(doctor_id);
    
        $.ajax({
            type: "POST",
            url: "code.php",
            data: {
                delete_doctor: true,
                'doctor_id': doctor_id
            },
            dataType: 'json',  // Specify data type as JSON
            success: function(response) {
                console.log(response);
                if (response.status == 500) {
                    alert(response.message);
                } else if (response.status == 200) {
                    $('#errorMessageUpdate').addClass('d-none');
                    $('#deleteSchedModal').modal('hide');
    
                    alertify.set('notifier', 'position', 'top-center');
                    alertify.success(response.message);
    
                    $('#doctor').load(location.href + " #doctor");
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
                alert("Failed to delete doctor. Please try again.");  // Provide a generic error message
            }
        });
    });
    
    
})