$(document).ready(function () {
    // loader
    $(function loaderLoad() {
        if ($(".loader").length) {
            $(".loader").delay(200).fadeOut(300);
        }
        $(".loader_disabler").on("click", function () {
            $("#loader").hide();
        });
    });

    $(".sidebar-toggle").click(function (e) {
        e.preventDefault();
        $(this).toggleClass("rotated");
        $(".sidebar").toggleClass("hidden");
        $(".sidebar-toggle").removeClass("visible");
    });

    $(".show-cat-btn").click(function (e) {
        e.preventDefault();
        $(this).next().toggleClass("visible");
        $(this).find(".category__btn").toggleClass("rotated");
    });

    $("#editUserModal").on("show.bs.modal", function (event) {
        var button = $(event.relatedTarget);
        var id = button.data("id");
        var fullname = button.data("fullname");
        var email = button.data("email");
        var role = button.data("role");
        var job_title = button.data("job_title");
        var phone = button.data("phone");
        var job_type = button.data("job_type");
        var job_category = button.data('job_category')
        var experience = button.data('experience')
        var age = button.data('age')
        var language = button.data('language')
        var facebook = button.data('facebook')
        var linkedin = button.data('linkedin')
        var instagram = button.data('instagram')
        var twitter = button.data('twitter')
        var country = button.data('country')
        var city = button.data('city')
        var full_address = button.data('full_address')

        var modal = $(this);
        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #name").val(fullname);
        modal.find(".modal-body #email").val(email);
        modal.find(".modal-body #role").val(role);
        modal.find(".modal-body #job_title").val(job_title);
        modal.find(".modal-body #phone").val(phone);
        modal.find(".modal-body #job_type").val(job_type);
        modal.find(".modal-body #job_category").val(job_category);
        modal.find(".modal-body #experience").val(experience);
        modal.find(".modal-body #age").val(age);
        modal.find(".modal-body #language").val(language);
        modal.find(".modal-body #facebook").val(facebook);
        modal.find(".modal-body #linkedin").val(linkedin);
        modal.find(".modal-body #instagram").val(instagram);
        modal.find(".modal-body #twitter").val(twitter);
        modal.find(".modal-body #country").val(country);
        modal.find(".modal-body #city").val(city);
        modal.find(".modal-body #full_address").val(full_address);
    });

    $("#editRoleModal").on("show.bs.modal", function (event) {
        let button = $(event.relatedTarget);
        let id = button.data("id");
        let role = button.data("role");

        let modal = $(this);
        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #role").val(role);
    });

    $("#editCategoryModal").on("show.bs.modal", function (event) {
        let button = $(event.relatedTarget);
        let id = button.data("id");
        let name = button.data("name");
        let icon = button.data("icon");

        let modal = $(this);
        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #name").val(name);
        modal.find(".modal-body #icon").val(icon);
    });

    $("#editTypeModal").on("show.bs.modal", function (event) {
        let button = $(event.relatedTarget);
        let id = button.data("id");
        let name = button.data("name");

        let modal = $(this);
        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #type").val(name);
    });

    $("#editExperienceModal").on("show.bs.modal", function (event) {
        let button = $(event.relatedTarget);
        let id = button.data("id");
        let title = button.data("title");

        let modal = $(this);
        modal.find(".modal-body #id").val(id);
        modal.find(".modal-body #title").val(title);
    });
});
