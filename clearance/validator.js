
$('document').ready(function()
{
        //customized methods
    jQuery.validator.addMethod("validEmail", function (value, element) {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value)) {
            return true;
        } else {
            return false;
        };
    }, "Enter a valid email address!");

    jQuery.validator.addMethod("phoneUS", function (phone_number, element) {
        phone_number = phone_number.replace(/\s+/g, "");
        return this.optional(element) || phone_number.length > 9 &&
                phone_number.match(/^\+[0-9]{12}$/);
    }, "Specify a valid phone number!");

        /*ADMIN SIDE VALIDATION     */
    //SECTION A: Students and Admin Login.
	 $("#login-form").validate({
      rules:
	  {

			password: {
			required: true,
			minlength: 4,
			maxlength: 15
			},
			email: {
            required: true,
            email: true,
            validEmail:true
            },
	   },
       messages:
       {
            password:{
                      required: "Please enter your password"
                     },
            email: {
                required:  "Please enter your email address",
                email: "Enter a valid email address!"
            },
       },
       });


    //SECTION A: Applicant's Registration Details.
	 $("#student").validate({
      rules:
	  {
	        fname: {
		    required: true,
            lettersonly: true,
			minlength: 3
			},
            mname:   {
              lettersonly: true
            },

            lname:   {
              required: true,
              lettersonly: true
            },
           gender:   {
              required: true
            },
			password: {
			required: true,
			minlength: 4,
			maxlength: 15
			},
			password2: {
			required: true,
			equalTo: '#password'
			},
			email: {
            required: true,
            email: true,
            validEmail:true
            },
	   },
       messages:
	   {    fname:{
                      required: "Please enter your First Name",
                      lettersonly: "Name should contains letters only!"
                     },
             mname:{
                      lettersonly: "Name should contains letters only!"
                     },

            lname:{
                      required: "Please enter your Last Name",
                      lettersonly: "Name should contains letters only!"
                     },
            gender:{
                      required: "Please provide your gender"
                     },
            password:{
                      required: "Please enter your password"
                     },
            password2:{
                required: "Confirm new password required!",
                equalTo:"Passwords should match!"
            },
            email: {
                required:  "Please enter your email address",
                email: "Enter a valid email address!"
            },
       },
       });


           //SECTION B: Applicant's Education Background.
    $("#education").validate({
        rules:{
            school_name:{
                required:true
            },
            startYear:{
                required:true,
                number: true
            },

            endYear:{
                required:true,
                number: true
            },

            areaOfStudy:{
                required:true
            },
            exam:{
                required:true
            },
            qualification:{
                required:true
            }
        },
        messages:{
           school_name: {
                  required: "Please your Previous Institution!"
            },
            startYear: {
                   required: "Provide year of Start!",
                   number: "Numeric figures only!"
            },
           endYear:{
               required: "Please provide completion year!",
                number: "Numeric figures only!"
           },
           areaOfStudy: {
               required: "Please provide your Grade or Award!"
               },
            exam:   {
                required: "Please provide your Exam Name!"
            },
            qualification:{
                required:"Provide your qualification level!"
            }
        }
    });


     //SECTION C: Applicant's Course Details.
    $("#course-form").validate({
        rules:{
            level:{
                required:true
            },

            intake:{
                required:true
            },

            programme:{
                required:true
            },
            centre:{
                required:true
            }
        },
        messages:{
            level: "Choose your Course Level!",
            intake: "Choose your intake name",
            programme: "Choose your programme of your choice!",
            studymode: "Choose your study Mode!",

            centre:{
                required:"Provide your campus of choice!"
            }
        }
    });
});
