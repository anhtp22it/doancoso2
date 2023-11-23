// Sử dụng debounce để kiểm soát tần suất gọi hàm xử lý sự kiện scroll
function debounce(func, delay) {
    let timer;
    return function () {
        clearTimeout(timer);
        timer = setTimeout(func, delay);
    };
}

$(document).ready(function () {
    var scrollTimeout;

    // loader
    $(function loaderLoad() {
        if ($(".loader").length) {
            $(".loader").delay(200).fadeOut(300);
        }
        $(".loader_disabler").on("click", function () {
            $("#loader").hide();
        });
    });

    // Sử dụng debounce cho sự kiện scroll để tránh gọi quá nhanh
    $(window).on("scroll", debounce(function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 50) {
            $(".header").addClass("header-fixed");
        } else {
            $(".header").removeClass("header-fixed");
        }
    }, 200)); // Thay đổi delay tùy theo nhu cầu

    // Sử dụng debounce cho sự kiện scroll để tránh gọi quá nhanh
    $(window).on("scroll", debounce(function () {
        var height = $(window).scrollTop();

        if (height >= 100) {
            $("#backToTop").fadeIn();
        } else {
            $("#backToTop").fadeOut();
        }
    }, 200)); // Thay đổi delay tùy theo nhu cầu

    // Kiểm tra nếu không có job_id trong URL
    if (!window.location.href.includes('job_id')) {
        $('#jobModal').modal('show'); // Mở modal
    }

});

// item slide
$(".review-slide").slick({
    slidesToShow: 3,
    arrows: true,
    dots: false,
    infinite: true,
    speed: 500,
    cssEase: "linear",
    autoplaySpeed: 2000,
    autoplay: true,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                arrows: true,
                dots: false,
                slidesToShow: 3,
            },
        },
        {
            breakpoint: 600,
            settings: {
                arrows: true,
                dots: false,
                slidesToShow: 1,
            },
        },
    ],
});

function updateLabel(input) {
    const label = input.nextElementSibling; // Lấy đối tượng label kế tiếp
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            label.style.backgroundImage = `url(${e.target.result})`;
        };

        reader.readAsDataURL(input.files[0]);

        // Ẩn biểu tượng khi có ảnh đã chọn
        label.querySelector('i.fa-user').style.display = 'none';
    } else {
        label.style.backgroundImage = null; // Xóa ảnh nền nếu không có tệp nào được chọn

        // Hiển thị biểu tượng khi không có ảnh đã chọn
        label.querySelector('i.fa-user').style.display = 'block';
    }
}

function addRequirement() {
    const requirementsContainer = document.getElementById('requirements-container');
    const newRequirement = document.createElement('div');
    newRequirement.classList.add('requirement', 'd-flex', 'mb-3');
    newRequirement.innerHTML = `
        <input type="text" name="requirements[]" class="form-control rounded me-2">
        <button class="btn btn-danger py-2 px-3 text-white rounded" onclick="removeRequirement(this)">Delete</button>
    `;
    requirementsContainer.appendChild(newRequirement);
}

function removeRequirement(button) {
    const requirementsContainer = document.getElementById('requirements-container');
    requirementsContainer.removeChild(button.parentElement);
}

document.getElementById('cv').addEventListener('change', function () {
    document.getElementById('cv_filename').value = this.files[0].name;
});

