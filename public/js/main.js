var CRUMINA = {};
!(function (e) {
    "use strict";
    var n = e(window),
        t = e(document),
        o = e("body"),
        a = e(".fixed-sidebar"),
        i = e("#hellopreloader");
    (CRUMINA.preloader = function () {
        return (
            n.scrollTop(0),
            setTimeout(function () {
                i.fadeOut(800);
            }, 500),
            !1
        );
    }),
        jQuery(".back-to-top").on("click", function () {
            return e("html,body").animate({ scrollTop: 0 }, 1200), !1;
        }),
        e(document).on("click", ".quantity-plus", function () {
            var n = parseInt(e(this).prev("input").val());
            return (
                e(this)
                    .prev("input")
                    .val(n + 1)
                    .change(),
                !1
            );
        }),
        e(document).on("click", ".quantity-minus", function () {
            var n = parseInt(e(this).next("input").val());
            return (
                1 !== n &&
                e(this)
                    .next("input")
                    .val(n - 1)
                    .change(),
                !1
            );
        }),
        e(function () {
            var n;
            e(document).on(
                "touchstart mousedown",
                ".number-spinner button",
                function () {
                    var t = e(this),
                        o = t.closest(".number-spinner").find("input");
                    t
                        .closest(".number-spinner")
                        .find("button")
                        .prop("disabled", !1),
                        (n =
                            "up" == t.attr("data-dir")
                                ? setInterval(function () {
                                    void 0 == o.attr("max") ||
                                        parseInt(o.val()) <
                                        parseInt(o.attr("max"))
                                        ? o.val(parseInt(o.val()) + 1)
                                        : (t.prop("disabled", !0),
                                            clearInterval(n));
                                }, 50)
                                : setInterval(function () {
                                    void 0 == o.attr("min") ||
                                        parseInt(o.val()) >
                                        parseInt(o.attr("min"))
                                        ? o.val(parseInt(o.val()) - 1)
                                        : (t.prop("disabled", !0),
                                            clearInterval(n));
                                }, 50));
                }
            ),
                e(document).on(
                    "touchend mouseup",
                    ".number-spinner button",
                    function () {
                        clearInterval(n);
                    }
                );
        }),
        e('a[data-toggle="tab"]').on("shown.bs.tab", function (n) {
            "#events" === e(n.target).attr("href") &&
                e(".fc-state-active").click();
        }),
        e(".js-sidebar-open").on("click", function () {
            return (
                e("body").outerWidth() <= 560 &&
                e(this)
                    .closest("body")
                    .find(".popup-chat-responsive")
                    .removeClass("open-chat"),
                e(this).toggleClass("active"),
                e(this).closest(a).toggleClass("open"),
                !1
            );
        }),
        n.keydown(function (e) {
            27 == e.which && a.is(":visible") && a.removeClass("open");
        }),
        t.on("click", function (n) {
            !e(n.target).closest(a).length &&
                a.is(":visible") &&
                a.removeClass("open");
        });
    var r = e(".window-popup");
    e(".js-open-popup").on("click", function (n) {
        var t = e(this).data("popup-target"),
            a = r.filter(t),
            i = e(this).offset();
        return (
            a.addClass("open"),
            a.css("top", i.top - a.innerHeight() / 2),
            o.addClass("overlay-enable"),
            !1
        );
    }),
        n.keydown(function (n) {
            27 == n.which &&
                (r.removeClass("open"),
                    o.removeClass("overlay-enable"),
                    e(".profile-menu").removeClass("expanded-menu"),
                    e(".popup-chat-responsive").removeClass("open-chat"),
                    e(".profile-settings-responsive").removeClass("open"),
                    e(".header-menu").removeClass("open"));
        }),
        t.on("click", function (n) {
            e(n.target).closest(r).length ||
                (r.removeClass("open"),
                    o.removeClass("overlay-enable"),
                    e(".profile-menu").removeClass("expanded-menu"),
                    e(".header-menu").removeClass("open"));
        }),
        e("[data-toggle=tab]").on("click", function () {
            if (
                e(this).hasClass("active") &&
                e(this).closest("ul").hasClass("mobile-app-tabs")
            )
                return (
                    e(e(this).attr("href")).toggleClass("active"),
                    e(this).removeClass("active"),
                    !1
                );
        }),
        e(".js-close-popup").on("click", function () {
            return (
                e(this).closest(r).removeClass("open"),
                o.removeClass("overlay-enable"),
                !1
            );
        }),
        e(".profile-settings-open").on("click", function () {
            return e(".profile-settings-responsive").toggleClass("open"), !1;
        }),
        e(".js-expanded-menu").on("click", function () {
            return e(".header-menu").toggleClass("expanded-menu"), !1;
        }),
        e(".js-chat-open").on("click", function () {
            return e(".popup-chat-responsive").toggleClass("open-chat"), !1;
        }),
        e(".js-chat-close").on("click", function () {
            return e(".popup-chat-responsive").removeClass("open-chat"), !1;
        }),
        e(".js-open-responsive-menu").on("click", function () {
            return e(".header-menu").toggleClass("open"), !1;
        }),
        e(".js-close-responsive-menu").on("click", function () {
            return e(".header-menu").removeClass("open"), !1;
        }),
        (CRUMINA.CallToActionAnimation = function () {
            var e = new ScrollMagic.Controller();
            new ScrollMagic.Scene({
                triggerElement: ".call-to-action-animation",
            })
                .setVelocity(
                    ".first-img",
                    { opacity: 1, bottom: "0", scale: "1" },
                    1200
                )
                .triggerHook(1)
                .addTo(e),
                new ScrollMagic.Scene({
                    triggerElement: ".call-to-action-animation",
                })
                    .setVelocity(
                        ".second-img",
                        { opacity: 1, bottom: "50%", right: "40%" },
                        1500
                    )
                    .triggerHook(1)
                    .addTo(e);
        }),
        (CRUMINA.ImgScaleAnimation = function () {
            var e = new ScrollMagic.Controller();
            new ScrollMagic.Scene({ triggerElement: ".img-scale-animation" })
                .setVelocity(".main-img", { opacity: 1, scale: "1" }, 200)
                .triggerHook(0.3)
                .addTo(e),
                new ScrollMagic.Scene({
                    triggerElement: ".img-scale-animation",
                })
                    .setVelocity(
                        ".first-img1",
                        { opacity: 1, scale: "1" },
                        1200
                    )
                    .triggerHook(0.8)
                    .addTo(e),
                new ScrollMagic.Scene({
                    triggerElement: ".img-scale-animation",
                })
                    .setVelocity(
                        ".second-img1",
                        { opacity: 1, scale: "1" },
                        1200
                    )
                    .triggerHook(1.1)
                    .addTo(e),
                new ScrollMagic.Scene({
                    triggerElement: ".img-scale-animation",
                })
                    .setVelocity(
                        ".third-img1",
                        { opacity: 1, scale: "1" },
                        1200
                    )
                    .triggerHook(1.4)
                    .addTo(e);
        }),
        (CRUMINA.SubscribeAnimation = function () {
            var e = new ScrollMagic.Controller();
            new ScrollMagic.Scene({ triggerElement: ".subscribe-animation" })
                .setVelocity(
                    ".plane",
                    {
                        opacity: 1,
                        bottom: "auto",
                        top: "-20",
                        left: "50%",
                        scale: "1",
                    },
                    1200
                )
                .triggerHook(1)
                .addTo(e);
        }),
        (CRUMINA.PlanerAnimation = function () {
            var e = new ScrollMagic.Controller();
            new ScrollMagic.Scene({ triggerElement: ".planer-animation" })
                .setVelocity(
                    ".planer",
                    { opacity: 1, left: "80%", scale: "1" },
                    2e3
                )
                .triggerHook(0.1)
                .addTo(e);
        }),
        (CRUMINA.ContactAnimationAnimation = function () {
            var e = new ScrollMagic.Controller();
            new ScrollMagic.Scene({ triggerElement: ".contact-form-animation" })
                .setVelocity(
                    ".crew",
                    { opacity: 1, left: "77%", scale: "1" },
                    1e3
                )
                .triggerHook(0.1)
                .addTo(e);
        }),
        t.ready(function () {
            CRUMINA.preloader(),
                e(".call-to-action-animation").length &&
                CRUMINA.CallToActionAnimation(),
                e(".img-scale-animation").length && CRUMINA.ImgScaleAnimation(),
                e(".subscribe-animation").length &&
                CRUMINA.SubscribeAnimation(),
                e(".planer-animation").length && CRUMINA.PlanerAnimation(),
                e(".contact-form-animation").length &&
                CRUMINA.ContactAnimationAnimation(),
                void 0 !== e.fn.gifplayer && e(".gif-play-image").gifplayer(),
                void 0 !== e.fn.mediaelementplayer &&
                e("#mediaplayer").mediaelementplayer({
                    features: [
                        "prevtrack",
                        "playpause",
                        "nexttrack",
                        "loop",
                        "shuffle",
                        "current",
                        "progress",
                        "duration",
                        "volume",
                    ],
                }),
                e(".mCustomScrollbar").perfectScrollbar({
                    wheelPropagation: !1,
                });
        });
})(jQuery);

/*$(document).ready(function(){
    alert("HOLAAA");
   });*/

function loadcourses() {
    //obtenemos  el id de la modalidad seleccionada
    var modality = $("#modalities").val();
    var token = $("#token").val();

    $.ajax({
        url: "../../ajax/coursesbymodalityid",
        //url:'../ajax/coursesbymodalityid',
        headers: token,
        data: { modality_id: modality, _token: token },
        type: "POST",
        datatype: "json",
        success: function (data) {
            //console.log(response);
            $("#courses").html(data);
        },
        error: function (response) {
            console.log(response);
        },
    });
}

//codigo para cargar solo las secciones asignadas al curso seleccionado
function loadsections() {
    //obtenemos  el id de la modalidad seleccionada
    var course = $("#courses").val();
    var token = $("#token").val();

    $.ajax({
        //url:'../ajax/sectionsbycoursesid',
        url: "../../ajax/sectionsbycoursesid",
        headers: token,
        data: { course_id: course, _token: token },
        type: "POST",
        datatype: "json",
        success: function (data) {
            //console.log(response);
            $("#sections").html(data);
        },
        error: function (response) {
            console.log(response);
        },
    });
}

//codigo para cargar solo las clases asignadas al curso seleccionado
function loadclases() {
    //obtenemos  el id de la modalidad seleccionada
    var course = $("#courses").val();
    var token = $("#token").val();

    $.ajax({
        url: "../ajax/clasesbycoursesid",
        headers: token,
        data: { course_id: course, _token: token },
        type: "POST",
        datatype: "json",
        success: function (data) {
            //console.log(response);
            $("#clases").html(data);
        },
        error: function (response) {
            console.log(response);
        },
    });
}

//codigo para cargar solo las clases asignadas a una modalidad seleccionado
function loadclasesbymodality() {
    //obtenemos  el id de la modalidad seleccionada
    var modalidad = $("#modalities").val();
    var token = $("#token").val();

    $.ajax({
        //url:'../../../../ajax/clasesbymodalityid',
        url: "../ajax/clasesbymodalityid",

        headers: token,
        data: { modality_id: modalidad, _token: token },
        type: "POST",
        datatype: "json",
        success: function (data) {
            //console.log(response);
            $("#clases").html(data);
        },
        error: function (response) {
            console.log(response);
        },
    });
}
//funcion para enviar un mensaje desde la bandeja de comentarios del student, la inicial que aparece al ingresar al panel
function publicar_student() {
    var usuario = $("#user").val();
    var curso = $("#course").val();
    var seccion = $("#section").val();
    var msj = $("#mensaje").val();
    var token = $("#token").val();

    if (msj == "") {
        toastr.options = {
            closeButton: false,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: "toast-top-center",
            preventDuplicates: false,
            onclick: null,
            showDuration: "500",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        };
        toastr.error("debes ingresar un mensaje");
    } else {
        $.ajax({
            url: "../../ajax/post_in_section",
            headers: token,
            data: {
                curso_id: curso,
                seccion_id: seccion,
                user_id: usuario,
                mensaje: msj,
                _token: token,
            },
            type: "POST",
            datatype: "json",

            beforeSend: function () {
                $("#btn_publicar").attr("disabled", true);
                $("#circle").circleProgress({
                    value: 0.75,
                    size: 80,
                    fill: {
                        gradient: ["red", "orange"],
                    },
                });
            },
            complete: function () {
                $("#circle").hide();
            },

            success: function (data) {
                //console.log(response);
                $("#mensaje").val("");

                $("#nuevo_post")
                    .prepend(data)
                    .fadeIn(1000, function () {
                        $("#nuevo_post").css({
                            border: "4px solid lightcoral",
                            "border-radius": "5px",
                        });
                    });

                toastr.options = {
                    closeButton: false,
                    debug: false,
                    newestOnTop: false,
                    progressBar: false,
                    positionClass: "toast-top-center",
                    preventDuplicates: false,
                    onclick: null,
                    showDuration: "500",
                    hideDuration: "1000",
                    timeOut: "5000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                };
                toastr.success("Mensaje publicado exitósamente");
                $("#btn_publicar").attr("disabled", false);
            },
            error: function (response) {
                console.log(response);
            },
        });
    }
}

//funcion para enviar un mensaje desde la bandeja de comentarios del docente, la inicial que aparece al ingresar al panel
function publicar_teacher() {
    var usuario = $("#user").val();
    var curso = $("#course").val();
    var seccion = $("#section").val();
    var msj = $("#mensaje").val();
    var token = $("#token").val();

    if (msj == "") {
        toastr.options = {
            closeButton: false,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: "toast-top-center",
            preventDuplicates: false,
            onclick: null,
            showDuration: "500",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        };
        toastr.error("debes ingresar un mensaje");
    } else {
        $.ajax({
            url: "../../../../ajax/post_in_section",
            headers: token,
            data: {
                curso_id: curso,
                seccion_id: seccion,
                user_id: usuario,
                mensaje: msj,
                _token: token,
            },
            type: "POST",
            datatype: "json",

            beforeSend: function () {
                $("#btn_publicar").attr("disabled", true);
                $("#circle").circleProgress({
                    value: 0.75,
                    size: 80,
                    fill: {
                        gradient: ["red", "orange"],
                    },
                });
            },
            complete: function () {
                $("#circle").hide();
            },

            success: function (data) {
                //console.log(response);
                $("#mensaje").val("");

                $("#nuevo_post")
                    .prepend(data)
                    .fadeIn(1000, function () {
                        $("#nuevo_post").css({
                            border: "4px solid lightcoral",
                            "border-radius": "5px",
                        });
                    });

                toastr.options = {
                    closeButton: false,
                    debug: false,
                    newestOnTop: false,
                    progressBar: false,
                    positionClass: "toast-top-center",
                    preventDuplicates: false,
                    onclick: null,
                    showDuration: "500",
                    hideDuration: "1000",
                    timeOut: "5000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                };
                toastr.success("Mensaje publicado exitósamente");
                $("#btn_publicar").attr("disabled", false);
            },
            error: function (response) {
                console.log(response);
            },
        });
    }
}

function filtrar_msj(teacher_id, student_id) {
    var token = $("#token").val();

    $.ajax({
        url: "../../ajax/filtrar_msj_byteacher",
        headers: token,
        data: { user_id: student_id, remitente: teacher_id, _token: token },
        type: "POST",
        datatype: "json",
        success: function (data) {
            $("#modal_msj_byteacher").html(data);
            $("#modal_msj_byteacher").modal("show");
        },
        error: function (response) {
            console.log(response);
        },
    });
}

//funcion para la seccion de comentario del teacher
function comentar_teacher(key_msj) {
    var token = $("#token").val();
    var curso_id = $("#course").val();
    var section = $("#section").val();
    var user_id = $("#user").val();

    $.ajax({
        url: "../../../../ajax/div_comentar",
        headers: token,
        data: {
            _token: token,
            key: key_msj,
            curso: curso_id,
            seccion: section,
            usuario: user_id,
        },
        type: "POST",
        datatype: "json",
        success: function (data) {
            //console.log(response);
            $("#comentar_msj_" + key_msj)
                .prepend(data)
                .fadeIn(1000, function () {
                    $("#comentar_msj_" + key_msj).css({
                        border: "2px solid lightcoral",
                        "border-radius": "5px",
                    });
                });
            $("#comentar_" + key_msj).hide();
            $("#comentario_" + key_msj).focus();
        },
        error: function (response) {
            console.log(response);
        },
    });
}

//funcion para la seccion de comentario del student
function comentar_student(key_msj) {
    var token = $("#token").val();
    var curso_id = $("#course").val();
    var section = $("#section").val();
    var user_id = $("#user").val();

    $.ajax({
        url: "../../ajax/div_comentar",
        headers: token,
        data: {
            _token: token,
            key: key_msj,
            curso: curso_id,
            seccion: section,
            usuario: user_id,
        },
        type: "POST",
        datatype: "json",
        success: function (data) {
            //console.log(response);
            $("#comentar_msj_" + key_msj)
                .prepend(data)
                .fadeIn(1000, function () {
                    $("#comentar_msj_" + key_msj).css({
                        border: "2px solid lightcoral",
                        "border-radius": "5px",
                    });
                });
            $("#comentar_" + key_msj).hide();
            $("#comentario_" + key_msj).focus();
        },
        error: function (response) {
            console.log(response);
        },
    });
}

function enviar_comentario_teacher(key_msj) {
    var token = $("#tokenC").val();
    var curso_id = $("#courseC").val();
    var section = $("#sectionC").val();
    var user_id = $("#userC").val();
    var comentarioC = $("#comentario_" + key_msj).val();
    var key = key_msj;

    $.ajax({
        url: "../../../../ajax/enviar_comentario",
        headers: token,
        data: {
            _token: token,
            curso: curso_id,
            seccion: section,
            usuario: user_id,
            comentario: comentarioC,
            key_msj: key,
        },
        type: "POST",
        datatype: "json",
        success: function (data) {
            //console.log(response);
            $("#comentar_msj_" + key_msj)
                .prepend(data)
                .fadeIn(1000, function () {
                    //$('#comentar_msj_'+key_msj).css({"border": "4px solid lightcoral", "border-radius": "5px"});
                });
            $("#comentario_" + key_msj).val("");
            $("#comentario_" + key_msj).focus();
        },
        error: function (response) {
            console.log(response);
        },
    });
}

function enviar_comentario_student(key_msj) {
    var token = $("#tokenC").val();
    var curso_id = $("#courseC").val();
    var section = $("#sectionC").val();
    var user_id = $("#userC").val();
    var comentarioC = $("#comentario_" + key_msj).val();
    var key = key_msj;

    $.ajax({
        url: "../../ajax/enviar_comentario",
        headers: token,
        data: {
            _token: token,
            curso: curso_id,
            seccion: section,
            usuario: user_id,
            comentario: comentarioC,
            key_msj: key,
        },
        type: "POST",
        datatype: "json",
        success: function (data) {
            //console.log(response);
            $("#comentar_msj_" + key_msj)
                .prepend(data)
                .fadeIn(1000, function () {
                    //$('#comentar_msj_'+key_msj).css({"border": "4px solid lightcoral", "border-radius": "5px"});
                });
            $("#comentario_" + key_msj).val("");
            $("#comentario_" + key_msj).focus();
        },
        error: function (response) {
            console.log(response);
        },
    });
}

function ver_comentarios_student(key_msj) {
    var token = $("#token").val();
    var key = key_msj;
    var curso_id = $("#course").val();
    var section = $("#section").val();

    var usuariox = $("#user").val();

    $.ajax({
        url: "../../ajax/ver_comentarios",
        headers: token,
        data: {
            _token: token,
            curso: curso_id,
            seccion: section,
            usuario: usuariox,
            key_msj: key,
        },
        type: "POST",
        datatype: "json",
        success: function (data) {
            //console.log(response);
            $("#cometar").hide();
            $("#ver_comentarios_" + key_msj)
                .html(data)
                .fadeIn(1000, function () {
                    $("#ver_comentarios_" + key_msj).css({
                        border: "1px solid lightblue",
                        "border-radius": "5px",
                    });
                    $("#mensaje_" + key_msj).focus();
                });
        },
        error: function (response) {
            console.log(response);
        },
    });
}

function ver_comentarios_teacher(key_msj) {
    var token = $("#token").val();
    var key = key_msj;
    var curso_id = $("#course").val();
    var section = $("#section").val();

    var usuariox = $("#user").val();

    $.ajax({
        url: "../../../../ajax/ver_comentarios",
        headers: token,
        data: {
            _token: token,
            curso: curso_id,
            seccion: section,
            usuario: usuariox,
            key_msj: key,
        },
        type: "POST",
        datatype: "json",
        success: function (data) {
            //console.log(response);
            $("#cometar").hide();
            $("#ver_comentarios_" + key_msj)
                .html(data)
                .fadeIn(1000, function () {
                    $("#ver_comentarios_" + key_msj).css({
                        border: "1px solid lightblue",
                        "border-radius": "5px",
                    });
                    $("#mensaje_" + key_msj).focus();
                });
        },
        error: function (response) {
            console.log(response);
        },
    });
}

//funcion para poder guardar en BD los comentarios
//despues de ver los primeros comentario comentarios
function publicarComentario_teacher(key_msj) {
    var usuario = $("#user").val();
    var curso = $("#course").val();
    var seccion = $("#section").val();
    var msj = $("#mensaje_" + key_msj).val();
    var key = key_msj;
    var token = $("#token").val();

    if (msj == "") {
        toastr.options = {
            closeButton: false,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: "toast-top-center",
            preventDuplicates: false,
            onclick: null,
            showDuration: "500",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        };
        toastr.error("debes ingresar un mensaje");
    } else {
        $.ajax({
            url: "../../../../ajax/publicarComentario",
            headers: token,
            data: {
                curso_id: curso,
                seccion_id: seccion,
                user_id: usuario,
                mensaje: msj,
                key_msj: key,
                _token: token,
            },
            type: "POST",
            datatype: "json",

            beforeSend: function () {
                $("#btn_publicar").attr("disabled", true);
                $("#circle" + key_msj).circleProgress({
                    value: 0.75,
                    size: 80,
                    fill: {
                        gradient: ["red", "orange"],
                    },
                });
            },
            complete: function () {
                $("#circle" + key_msj).hide();
            },

            success: function (data) {
                //console.log(response);
                $("#mensaje_" + key_msj).val("");

                $("#lista_" + key_msj)
                    .append(data)
                    .fadeIn(1000, function () {
                        $("#ver_comentarios_" + key_msj).css({
                            border: "2px solid lightblue",
                            "border-radius": "5px",
                        });
                    });

                toastr.options = {
                    closeButton: false,
                    debug: false,
                    newestOnTop: false,
                    progressBar: false,
                    positionClass: "toast-top-center",
                    preventDuplicates: false,
                    onclick: null,
                    showDuration: "500",
                    hideDuration: "1000",
                    timeOut: "5000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                };
                toastr.success("Mensaje publicado exitósamente");
                $("#btn_publicar").attr("disabled", false);
            },
            error: function (response) {
                console.log(response);
            },
        });
    }
}

function publicarComentario_student(key_msj) {
    var usuario = $("#user").val();
    var curso = $("#course").val();
    var seccion = $("#section").val();
    var msj = $("#mensaje_" + key_msj).val();
    var key = key_msj;
    var token = $("#token").val();

    if (msj == "") {
        toastr.options = {
            closeButton: false,
            debug: false,
            newestOnTop: false,
            progressBar: false,
            positionClass: "toast-top-center",
            preventDuplicates: false,
            onclick: null,
            showDuration: "500",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut",
        };
        toastr.error("debes ingresar un mensaje");
    } else {
        $.ajax({
            url: "../../ajax/publicarComentario",
            headers: token,
            data: {
                curso_id: curso,
                seccion_id: seccion,
                user_id: usuario,
                mensaje: msj,
                key_msj: key,
                _token: token,
            },
            type: "POST",
            datatype: "json",

            beforeSend: function () {
                $("#btn_publicar").attr("disabled", true);
                $("#circle" + key_msj).circleProgress({
                    value: 0.75,
                    size: 80,
                    fill: {
                        gradient: ["red", "orange"],
                    },
                });
            },
            complete: function () {
                $("#circle" + key_msj).hide();
            },

            success: function (data) {
                //console.log(response);
                $("#mensaje_" + key_msj).val("");

                $("#lista_" + key_msj)
                    .append(data)
                    .fadeIn(1000, function () {
                        $("#ver_comentarios_" + key_msj).css({
                            border: "2px solid lightblue",
                            "border-radius": "5px",
                        });
                    });

                toastr.options = {
                    closeButton: false,
                    debug: false,
                    newestOnTop: false,
                    progressBar: false,
                    positionClass: "toast-top-center",
                    preventDuplicates: false,
                    onclick: null,
                    showDuration: "500",
                    hideDuration: "1000",
                    timeOut: "5000",
                    extendedTimeOut: "1000",
                    showEasing: "swing",
                    hideEasing: "linear",
                    showMethod: "fadeIn",
                    hideMethod: "fadeOut",
                };
                toastr.success("Mensaje publicado exitósamente");
                $("#btn_publicar").attr("disabled", false);
            },
            error: function (response) {
                console.log(response);
            },
        });
    }
}

function loadcourses_2() {
    //obtenemos  el id de la modalidad seleccionada
    var modality = $("#modalities").val();
    var token = $("#token").val();

    $.ajax({
        //url:'../../ajax/coursesbymodalityid',
        url: "../ajax/coursesbymodalityid",
        headers: token,
        data: { modality_id: modality, _token: token },
        type: "POST",
        datatype: "json",
        success: function (data) {
            //console.log(response);
            $("#courses").html(data);
        },
        error: function (response) {
            console.log(response);
        },
    });
}

//codigo para cargar solo las secciones asignadas al curso seleccionado
function loadsections_2() {
    //obtenemos  el id de la modalidad seleccionada
    var course = $("#courses").val();
    var token = $("#token").val();

    $.ajax({
        url: "../ajax/sectionsbycoursesid",
        //url:'../../ajax/sectionsbycoursesid',
        headers: token,
        data: { course_id: course, _token: token },
        type: "POST",
        datatype: "json",
        success: function (data) {
            //console.log(response);
            $("#sections").html(data);
        },
        error: function (response) {
            console.log(response);
        },
    });
}

//codigo para cargar solo las clases asignadas al curso seleccionado
function loadclases_2() {
    //obtenemos  el id de la modalidad seleccionada
    var course = $("#courses").val();
    var token = $("#token").val();

    $.ajax({
        url: "../ajax/clasesbycoursesid",
        headers: token,
        data: { course_id: course, _token: token },
        type: "POST",
        datatype: "json",
        success: function (data) {
            //console.log(response);
            $("#clases").html(data);
        },
        error: function (response) {
            console.log(response);
        },
    });
}

function cargarsecciones_gsuit() {

    var _curso = $("#cursos").val();
    var token = $("#token").val();

    $.ajax({
        url: "../../ajax/sectionsbycoursesGsuit",
        //url:'../../ajax/sectionsbycoursesid',
        headers: token,
        data: { _curso: _curso, _token: token },
        type: "POST",
        datatype: "json",
        success: function (data) {
            //console.log(response);
            $("#secciones").html(data);
        },
        error: function (response) {
            console.log(response);
        },
    });

}

//funcion (docente) que se activa al cambiar de grado y seccion en el panel izquierdo
/*function cambio_de_seccion(curso_id, seccion, short_name){
    //actualizamos las variables globales
    $("#course").val(curso_id);
    $("#course_shortname").val(short_name);
    $("#section").val(seccion);

    //enviamos el mensaje de bienvenida al grupo
    toastr.options = {
        "positionClass": "toast-top-center"
        }
        toastr["success"]('<p style = "text-align:center;"> Bienvenido a </p><p style = "text-align:center;">'+short_name+' Grado - Sección '+seccion+'</p>' );

    //cargar los mensajes del nuevo curso y seccion


}*/
