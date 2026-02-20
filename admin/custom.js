//Add Centre Data 
$(document).ready(function() {
    $('#traning_centre_form').on('submit', function() {
        $("#addcentre_btn").text('Loading..');
        var data = new FormData(this);
        data.append('action', 'add_centre');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {
                    swal.fire(response.message, "", "")
                        .then(() => {
                            swal.fire("", "Center Added Successfully", "success");
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        });
                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#addcentre_btn").text('Submit');
        return false;
    });

});
//Traning centre Update
$(document).ready(function() {
    $('#update_traning_centre').on('submit', function() {
        $("#updateCentre_btn").text('Loading..');
        var data = new FormData(this);
        var id = $(this).data('id');
        data.append('action', 'Update_tran_centre');
        data.append('id', id);
        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {

                    swal.fire("", response.message, "success");
                    setTimeout(function() {
                        window.location.reload(); /*  = "admit-card-list.php"; */
                    }, 2000);

                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#updateCentre_btn").text('Update');
        return false;
    });

});
//Admin profile Update
$(document).ready(function() {
    $('#admin_Update_form').on('submit', function() {
        $("#admin_Update").text('Loading..');
        var data = new FormData(this);
        var id = $(this).data('id');

        data.append('action', 'Update_admin_profile');
        data.append('id', id);
        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {

                    swal.fire("", response.message, "success");
                    setTimeout(function() {
                        window.location.reload(); /*  = "admit-card-list.php"; */
                    }, 2000);

                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#admin_Update").text('Update Profile');
        return false;
    });

});
/* Second Roll Number Generate */
$(document).ready(function() {

    $('.generate_rollno').click(function() {
        var id = $(this).data('id');
        var data = new FormData();
        data.append('id', id);
        data.append('action', 'generate_roll_no');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {
                    swal.fire("", response.message, "success");

                    $("#row" + id).fadeOut("slow");

                    setTimeout(function() {

                        location.reload();
                    }, 3000);
                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {

                swal.fire("", "Failed to submit your request.", "error");
            }
        });

        return false;
    });
    /* End */
});
//Add Marks 
$(document).ready(function() {
    $('#insert_Makrs').on('submit', function() {
        $("#insertMakrs_btn").text('Loading..');
        var data = new FormData(this);
        data.append('action', 'Insert_marks');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {

                if (response.status == 'success') {

                    swal.fire("", response.message, "success");
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#insertMakrs_btn").text('Submit Marks Sheet');
        return false;
    });

});
//Update Marks
$(document).ready(function() {
    $('#updateMarks_sheet').on('submit', function() {
        $("#updateMakrs_btn").text('Loading..');
        var data = new FormData(this);
        var id = $(this).data('id');
        data.append('action', 'Update_markSheet');
        data.append('id', id);
        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {

                    swal.fire("", response.message, "success");
                    setTimeout(function() {
                        window.location.reload(); /*  = "admit-card-list.php"; */
                    }, 2000);

                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#updateMakrs_btn").text('Update Admit Card');
        return false;
    });

});
/* Mark Sheet Status Enable/Disabled */
$(document).ready(function() {

    $('.status_marksheetbtn').click(function() {

        var id = $(this).data('id');
        var data = new FormData();
        data.append('id', id);
        //alert(id);
        data.append('action', 'marksheet_status_change');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {
                    swal.fire("", response.message, "success");

                    $("#row" + id).fadeOut("slow");

                    setTimeout(function() {

                        $("#row" + id).remove();
                        location.reload();
                    }, 3000);
                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {

                swal.fire("", "Failed to submit your request.", "error");
            }
        });

        return false;
    });
    /* End Status Mark Sheet*/
});
/* Admit Card Published*/
$(document).ready(function() {
    $('#Admitcard_published').on('submit', function() {
        $("#published_admitcard").text('Loading..');
        var data = new FormData(this);
        data.append('action', 'Release_adminCards');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {

                if (response.status == 'success') {

                    swal.fire("", response.message, "success");
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#published_admitcard").text('Generate ID');
        return false;
    });

});

//Generate ID
$(document).ready(function() {
    $('#generateID_form').on('submit', function() {
        $("#GenerateID_btn").text('Loading..');
        var data = new FormData(this);
        data.append('action', 'Create_admitID');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {

                if (response.status == 'success') {

                    swal.fire("", response.message, "success");
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#GenerateID_btn").text('Generate ID');
        return false;
    });

});
//Update Admit Card
$(document).ready(function() {
    $('#updateAdmit_card').on('submit', function() {
        $("#UpdateID_btn").text('Loading..');
        var data = new FormData(this);
        var id = $(this).data('id');
        data.append('action', 'Update_admitID');
        data.append('id', id);
        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {

                    swal.fire("", response.message, "success");
                    setTimeout(function() {
                        window.location = "admit-card-list.php";
                    }, 2000);

                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#UpdateID_btn").text('Update Admit Card');
        return false;
    });

});
/* Admit Card Status Enable/Disabled */
$(document).ready(function() {

    $('.admitCard_status_btn').click(function() {

        var id = $(this).data('id');
        var data = new FormData();
        data.append('id', id);
        //alert(id);
        data.append('action', 'admit_status_change');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {
                    swal.fire("", response.message, "success");

                    $("#row" + id).fadeOut("slow");

                    setTimeout(function() {


                        location.reload();
                    }, 3000);
                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {

                swal.fire("", "Failed to submit your request.", "error");
            }
        });

        return false;
    });
    /* End Status Admit Card*/
});
/* Admit Delete */
$(document).ready(function() {

    $('.admit_card_del_btns').click(function() {
        var a = confirm('Are you sure to delete this admit card permanetly');
        if (a == true) {
            var rid = $(this).data('id');
            var data = new FormData();
            data.append('id', rid);
            data.append('action', 'Admit_card_delete');
            //alert(rid);
            $.ajax({
                url: "ajax.php",
                type: "post",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    if (response.status == 'success') {
                        swal.fire("", response.message, "success");

                        $("#row" + rid).fadeOut("slow");

                        setTimeout(function() {

                            $("#row" + rid).remove();
                            location.reload();
                        }, 3000);
                    } else if (response.status == 'failed') {

                        swal.fire("", response.message, "error");
                    }
                },
                error: function() {

                    swal.fire("", "Failed to submit your request.", "error");
                }
            });
        }
        return false;
    });
    /* End Delete */
});
//add Subject
$(document).ready(function() {
    $('#addSubject_form').on('submit', function() {
        $("#addSubject_btn").text('Loading..');
        var data = new FormData(this);
        data.append('action', 'add_subject');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {

                if (response.status == 'success') {

                    swal.fire("", response.message, "success");
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#addSubject_btn").text('Add Subject');
        return false;
    });

});
//Subject Update
$(document).ready(function() {
    $('#updateSubject_form').on('submit', function() {
        $("#updateSubject_btn").text('Loading..');
        var data = new FormData(this);
        var id = $(this).data('id');
        data.append('action', 'update_subject');
        data.append('id', id);
        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {

                    swal.fire("", response.message, "success");
                    setTimeout(function() {
                        window.location = "subject-list.php";
                    }, 2000);

                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#updateSubject_btn").text('Update Subject');
        return false;
    });

});
/* Subject Status Enable/Disabled */
$(document).ready(function() {

    $('.status_subjectbtn').click(function() {

        var id = $(this).data('id');
        var data = new FormData();
        data.append('id', id);
        //alert(id);
        data.append('action', 'subject_status_change');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {
                    swal.fire("", response.message, "success");

                    $("#row" + id).fadeOut("slow");

                    setTimeout(function() {

                        $("#row" + id).remove();
                        location.reload();
                    }, 3000);
                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {

                swal.fire("", "Failed to submit your request.", "error");
            }
        });

        return false;
    });
    /* End Status users*/
});
/* Course Delete */
$(document).ready(function() {

    $('.subjectedel_btns').click(function() {
        var a = confirm('Are you sure to delete this subject');
        if (a == true) {
            var rid = $(this).data('id');
            var data = new FormData();
            data.append('id', rid);
            data.append('action', 'Subject_delete');

            $.ajax({
                url: "ajax.php",
                type: "post",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    if (response.status == 'success') {
                        swal.fire("", response.message, "success");

                        $("#row" + rid).fadeOut("slow");

                        setTimeout(function() {

                            $("#row" + rid).remove();
                            location.reload();
                        }, 3000);
                    } else if (response.status == 'failed') {

                        swal.fire("", response.message, "error");
                    }
                },
                error: function() {

                    swal.fire("", "Failed to submit your request.", "error");
                }
            });
        }
        return false;
    });
    /* End Delete */
});

//add Course
$(document).ready(function() {
    $('#addCourse_form').on('submit', function() {
        $("#addcourse_btn").text('Loading..');
        var data = new FormData(this);
        data.append('action', 'add_courses');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {

                if (response.status == 'success') {

                    swal.fire("", response.message, "success");
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#addcourse_btn").text('Submit');
        return false;
    });

});
//Course Update
$(document).ready(function() {
    $('#updateCourse_form').on('submit', function() {
        $("#upcourse_btn").text('Loading..');
        var data = new FormData(this);
        var id = $(this).data('id');
        data.append('action', 'update_course');
        data.append('id', id);
        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {

                    swal.fire("", response.message, "success");
                    setTimeout(function() {
                        window.location = "course-list.php";
                    }, 2000);

                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#upcourse_btn").text('Update');
        return false;
    });

});

/* Course Delete */
$(document).ready(function() {

    $('.coursedel_btns').click(function() {
        var a = confirm('Are you sure to delete this course');
        if (a == true) {
            var rid = $(this).data('id');
            var data = new FormData();
            data.append('id', rid);
            data.append('action', 'course_delete');

            $.ajax({
                url: "ajax.php",
                type: "post",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    if (response.status == 'success') {
                        swal.fire("", response.message, "success");

                        $("#row" + rid).fadeOut("slow");

                        setTimeout(function() {

                            $("#row" + rid).remove();
                            location.reload();
                        }, 3000);
                    } else if (response.status == 'failed') {

                        swal.fire("", response.message, "error");
                    }
                },
                error: function() {

                    swal.fire("", "Failed to submit your request.", "error");
                }
            });
        }
        return false;
    });
    /* End Delete users*/
});
/* Course Status Enable/Disabled */
$(document).ready(function() {

    $('.status_changebtn').click(function() {

        var id = $(this).data('id');
        var data = new FormData();
        data.append('id', id);
        data.append('action', 'course_status_change');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {
                    swal.fire("", response.message, "success");

                    $("#row" + id).fadeOut("slow");

                    setTimeout(function() {

                        $("#row" + id).remove();
                        location.reload();
                    }, 3000);
                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {

                swal.fire("", "Failed to submit your request.", "error");
            }
        });

        return false;
    });
    /* End Delete users*/
});

//add Department
$(document).ready(function() {
    $('#depart_form').on('submit', function() {
        $("#adddepart_btn").text('Loading..');
        var data = new FormData(this);
        data.append('action', 'add_department');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {

                if (response.status == 'success') {

                    swal.fire("", response.message, "success");
                    setTimeout(function() {
                        window.location = "department-list.php";
                    }, 2000);

                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#adddepart_btn").text('Submit');
        return false;
    });

});

//add Department
$(document).ready(function() {
    $('#depart_form_edit').on('submit', function() {
        $("#editdepart_btn").text('Loading..');
        var data = new FormData(this);
        var depart_edit_id = $(this).data('id');
        data.append('action', 'edit_department');
        data.append('id', depart_edit_id);
        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {

                    swal.fire("", response.message, "success");
                    setTimeout(function() {
                        window.location = "department-list.php";
                    }, 2000);

                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#editdepart_btn").text('Submit');
        return false;
    });

});
/* Dipartment Status Enable/Disabled */
$(document).ready(function() {

    $('.dipart_status_btn').click(function() {

        var id = $(this).data('id');
        var data = new FormData();
        data.append('id', id);
        data.append('action', 'dipartment_status_change');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {
                    swal.fire("", response.message, "success");

                    $("#row" + id).fadeOut("slow");

                    setTimeout(function() {

                        $("#row" + id).remove();
                        location.reload();
                    }, 3000);
                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {

                swal.fire("", "Failed to submit your request.", "error");
            }
        });

        return false;
    });
    /* End status*/
});
$(document).ready(function() {
    /* Start Department Delete */
    $('.del_btns').click(function() {
        var a = confirm('Are you sure to delete this dipartment');
        if (a == true) {
            var status_id = $(this).data('id');
            var data = new FormData();
            data.append('id', status_id);
            data.append('action', 'dept_del');

            $.ajax({
                url: "ajax.php",
                type: "post",
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function(response) {
                    if (response.status == 'success') {
                        swal.fire("", response.message, "success");

                        $("#row" + status_id).fadeOut("slow");
                        setTimeout(function() {
                            location.reload();
                            $("#row" + status_id).remove();
                        }, 3000);
                    } else if (response.status == 'failed') {

                        swal.fire("", response.message, "error");
                    }
                },
                error: function() {

                    swal.fire("", "Failed to submit your request.", "error");
                }
            });
        }
        return false;
    });
    /* End Delete users*/
});

//Add Student
$(document).ready(function() {
    $('#addStud_form').on('submit', function() {
        $("#addstu_btn").text('Loading..');
        var data = new FormData(this);
        data.append('action', 'add_stud_pro');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {

                if (response.status == 'success') {

                    swal.fire("", response.message, "success");
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#addstu_btn").text('Submit');
        return false;
    });

});

//Edit Student
$(document).ready(function() {
    $('#editStud_form').on('submit', function() {
        $("#edittu_btn").text('Loading..');
        var data = new FormData(this);
        var stud_edit_id = $(this).data('id');
        data.append('action', 'edit_stud_form');
        data.append('id', stud_edit_id);
        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {

                    swal.fire("", response.message, "success");
                    setTimeout(function() {
                        window.location = "student-list.php";
                    }, 2000);

                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#edittu_btn").text('Submit');
        return false;
    });

});

$(document).ready(function() {
    /* Start Course Status */
    $('.stud_del_btns').click(function() {
        var stud_del_id = $(this).data('id');
        var data = new FormData();
        data.append('id', stud_del_id);
        data.append('action', 'stud_del');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {
                    swal.fire("", response.message, "success");

                    $("#row" + stud_del_id).fadeOut("slow");
                    setTimeout(function() {
                        $("#row" + stud_del_id).remove();
                    }, 3000);
                }
            },
            error: function() {

                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        return false;
    });
    /* End Delete Course*/
});

//Add Employee
$(document).ready(function() {
    $('#addEmpl_form').on('submit', function() {
        $("#addempl_btn").text('Loading..');
        var data = new FormData(this);
        data.append('action', 'add_empl_pro');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {

                if (response.status == 'success') {

                    swal.fire("", response.message, "success");
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#addempl_btn").text('Submit');
        return false;
    });

});

//Edit Employee
$(document).ready(function() {
    $('#editEmpl_form').on('submit', function() {
        $("#updtempl_btn").text('Loading..');
        var data = new FormData(this);
        var empl_edit_id = $(this).data('id');
        data.append('action', 'edit_empl_form');
        data.append('id', empl_edit_id);
        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {

                    swal.fire("", response.message, "success");
                    setTimeout(function() {
                        window.location = "employee-list.php";
                    }, 2000);

                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {
                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        $("#updtempl_btn").text('Submit');
        return false;
    });
    
});

/* Dipartment Status Enable/Disabled */
$(document).ready(function() {
    $('.empl_action_btn').click(function() {

        var id = $(this).data('id');
        var data = new FormData();
        data.append('id', id);
        data.append('action', 'empl_status_change');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {
                    swal.fire("", response.message, "success");

                    $("#row" + id).fadeOut("slow");

                    setTimeout(function() {

                        $("#row" + id).remove();
                        location.reload();
                    }, 3000);
                } else if (response.status == 'failed') {

                    swal.fire("", response.message, "error");
                }
            },
            error: function() {

                swal.fire("", "Failed to submit your request.", "error");
            }
        });

        return false;
    });
    /* End status*/
});
$(document).ready(function() {
    /* Start Employee Delete */
    $('.emp_del_btns').click(function() {
        var empl_del_id = $(this).data('id');
        var data = new FormData();
        data.append('id', empl_del_id);
        data.append('action', 'empl_del');

        $.ajax({
            url: "ajax.php",
            type: "post",
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
                if (response.status == 'success') {
                    swal.fire("", response.message, "success");

                    $("#row" + empl_del_id).fadeOut("slow");
                    setTimeout(function() {
                        $("#row" + empl_del_id).remove();
                    }, 3000);
                }
            },
            error: function() {

                swal.fire("", "Failed to submit your request.", "error");
            }
        });
        return false;
    });
    /* End Delete Course*/
});