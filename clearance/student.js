    $(document).ready(function(){
        //approval of applicants by the dean
        $(document).on('click', '#approve_applicant', function(e){
            var applicantId = $(this).data('id');
            SwalApprove(applicantId);
            e.preventDefault();
        });
    //delete of announcements
        $(document).on('click', '#delete_announcement', function(e){
            var announcementId = $(this).data('id');
            SwalDeleteAnnouncement(announcementId);
            e.preventDefault();
        });

       //approve by department status
         $(document).on('click', '#approve_applicant3', function(e){
            var applicantId3 = $(this).data('id');
            SwalApprove3(applicantId3);
            e.preventDefault();
        });

        //disaaprove by department status
          $(document).on('click', '#disapprove_applicant', function(e){
            var applicantId3 = $(this).data('id');
            SwalDisApprove(applicantId3);
            e.preventDefault();
        });

        //ignore the communication from a user
           $(document).on('click', '#ignore', function(e){
            var inquiry = $(this).data('id');
            SwalIgnoreInquiry(inquiry);
            e.preventDefault();
        });

    });
    function SwalApprove(applicantId){
        swal({
            title: 'Sure to Approve?',
            text: "It will be updated permanently!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Approve,!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
              return new Promise(function(resolve) {
                 $.ajax({
               		url: 'approve.php',
                	type: 'POST',
                   	data: 'approve='+applicantId,
                   	dataType: 'json'
                 })
                 .done(function(response){
                 	swal('Approved!', response.message, response.status);
                    window.location.reload(forceGet);
                 })
                 .fail(function(){
                 	swal('Oops...', 'Something went wrong with ajax !', 'error');
                 });
              });
            },
            allowOutsideClick: false
        });
    }


   //approve the applicant at the department
    function SwalApprove3(applicantId3){
        swal({
            title: 'Sure to Approve?',
            text: "It will be updated permanently!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Approve,!',
            showLoaderOnConfirm: true,

            preConfirm: function() {
              return new Promise(function(resolve) {

                 $.ajax({
               		url: 'approve.php',
                	type: 'POST',
                   	data: 'approve='+applicantId3,
                   	dataType: 'json'
                 })
                 .done(function(response){
                 	swal('Approved!', response.message, response.status);
                    window.location.reload(forceGet);
                 })
                 .fail(function(){
                 	swal('Oops...', 'Something went wrong with ajax !', 'error');
                 });
              });
            },
            allowOutsideClick: false
        });

    }
     //disaaprove the applicant at department level
     function SwalDisApprove(applicantId3){
        swal({
            title: 'Disapprove the applicant?',
            text: "It will be updated permanently!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Disapprove,!',
            showLoaderOnConfirm: true,

            preConfirm: function() {
              return new Promise(function(resolve) {
                 $.ajax({
               		url: 'disapprove_dept.php',
                	type: 'POST',
                   	data: 'disapprove='+applicantId3,
                   	dataType: 'json'
                 })
                 .done(function(response){
                 	swal('Disapproved!', response.message, response.status);
                    window.location.reload(forceGet);
                 })
                 .fail(function(){
                 	swal('Oops...', 'Something went wrong with ajax !', 'error');
                 });
              });
            },
            allowOutsideClick: false
        });
    }


     function SwalDeleteAnnouncement(announcementId){
        swal({
            title: 'Sure Delete Announcement?',
            text: "It will be deleted permanently!",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete, Yes!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
              return new Promise(function(resolve) {

                 $.ajax({
               		url: 'delete_announcements.php',
                	type: 'POST',
                   	data: 'delete='+announcementId,
                   	dataType: 'json'
                 })
                 .done(function(response){
                 	swal('Deleted!', response.message, response.status);
                    window.location.reload(true);
                 })
                 .fail(function(){
                 	swal('Oops...', 'Something went wrong with ajax !', 'error');
                 });
              });
            },
            allowOutsideClick: false
        });
    }

    //operate the ignoring of communication from the user
    function SwalIgnoreInquiry(inquiry){
        swal({
            title: 'Ignore the inquiry?',
            text: "It will be updated permanently!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ignore, Yes!',
            showLoaderOnConfirm: true,
            preConfirm: function() {
              return new Promise(function(resolve) {

                 $.ajax({
               		url: 'ignore_inquiry.php',
                	type: 'POST',
                   	data: 'ignore_response='+inquiry,
                   	dataType: 'json'
                 })
                 .done(function(response){
                 	swal('Ignored!', response.message, response.status);
                    window.location.reload(true);
                 })
                 .fail(function(){
                 	swal('Oops...', 'Something went wrong with ajax !', 'error');
                 });
              });
            },
            allowOutsideClick: false
        });
    }