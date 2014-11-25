$(document).ready(function() {
    $('#accountForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        ignore: [],
        fields: {
            VIN: {
                validators: {
                    notEmpty: {
                        message: 'The VIN is required and cannot be empty'
                    }
                }
            },
            Make: {
                validators: {
                    notEmpty: {
                        message: 'The make is required and cannot be empty'
                    }
                }
            },
            Model: {
                validators: {
                    notEmpty: {
                        message: 'The model is required and cannot be empty'
                    },
                }
            },
            Year: {
                validators: {
                    notEmpty: {
                        message: 'The year is required and cannot be empty'
                    }
                }
            },
            Mileage: {
                validators: {
                    notEmpty: {
                        message: 'The mileage is required and cannot be empty'
                    }
                }
            },
            Color: {
                validators: {
                    notEmpty: {
                        message: 'The color is required and cannot be empty'
                    }
                }
            },
            Cost: {
                validators: {
                    notEmpty: {
                        message: 'The sales cost is required and cannot be empty'
                    }
                }
            },
            Price: {
                validators: {
                    notEmpty: {
                        message: 'The sales price is required and cannot be empty'
                    }
                }
            },
            Description: {
                validators: {
                    notEmpty: {
                        message: 'A description is required and cannot be empty'
                    }
                }
            },
            files: {
                validators: {
                    notEmpty: {
                        message: 'A file is required and cannot be empty'
                    }
                }
            },
            fname: {
                validators: {
                    notEmpty: {
                        message: 'A first name is required and cannot be empty'
                    }
                }
            },
            lname: {
                validators: {
                    notEmpty: {
                        message: 'A last name is required and cannot be empty'
                    }
                }
            },
            addr: {
                validators: {
                    notEmpty: {
                        message: 'An address is required and cannot be empty'
                    }
                }
            },
            city: {
                validators: {
                    notEmpty: {
                        message: 'A city is required and cannot be empty'
                    }
                }
            },
            state: {
                validators: {
                    notEmpty: {
                        message: 'A state is required and cannot be empty'
                    }
                }
            },
            zip: {
                validators: {
                    notEmpty: {
                        message: 'A zip code is required and cannot be empty'
                    }
                }
            },
            phone: {
                validators: {
                    notEmpty: {
                        message: 'A phone number is required and cannot be empty'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'An email address is required and cannot be empty'
                    }
                }
            }
        },
        submitHandler: function(validator, form, submitButton) {
             document.accountForm.submit();
        }
    });
});