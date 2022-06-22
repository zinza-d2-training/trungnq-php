$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#form-user").submit(function (e) {
        e.preventDefault();
        var fd = new FormData();
        var files = $("#avatar")[0].files;
        if (files.length > 0) {
            fd.append("avatar", files[0]);
        }
        fd.append("name", $("#name").val());
        fd.append("email", $("#email").val());
        fd.append("dob", $("#dob").val());
        fd.append("old_password", $("#old_password").val());
        fd.append("password", $("#password").val());
        fd.append("password_confirmation", $("#password_confirmation").val());
        id = $("#id_user").val();
        $.ajax({
            type: "POST",
            url: "/account/" + id,
            data: fd,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                toast(response.type, response.message);
                setTimeout(() => {
                    window.location.reload();
                }, 3500);
            },
        });
    });

    $("#form-update-user").submit(function (e) {
        e.preventDefault();
        createFormUser("/user/edit/" + $("#id").val());
    });

    $("#form-create-user").submit(function (e) {
        e.preventDefault();
        createFormUser("/user/create");
    });

    $(".deleteUser").click(function (e) {
        e.preventDefault();
        if (confirm("xoas user")) {
            let id = $(this).attr("user_id");
            $.ajax({
                type: "POST",
                url: "user/destroy/" + id,
                data: "id=" + id,
                dataType: "JSON",
                success: function (response) {
                    toast(response.type, response.message);
                },
            });
            $(this).closest(".user-row").remove();
        }
    });

    $("#checkfull").on("click", function (e) {
        if ($(this).is(":checked", true)) {
            $(".checkitem").prop("checked", true);
        } else {
            $(".checkitem").prop("checked", false);
        }
    });

    $("#btn-delete-mutiple-user").on("click", function (e) {
        deleteMutiple("user/destroy-mutiple", "user-row");
    });

    $("#btn-delete-mutiple-topic").on("click", function (e) {
        deleteMutiple("topic/destroy-mutiple", "topic-row");
    });

    $("#btn-delete-mutiple-tag").on("click", function (e) {
        deleteMutiple("tag/destroy-mutiple", "tag-row");
    });

    $("#formUpdateCompany").submit(function (e) {
        e.preventDefault();
        var fd = new FormData();
        var files = $("#avatar")[0].files;
        if (files.length > 0) {
            fd.append("avatar", files[0]);
        }
        fd.append("name", $("#name").val());
        fd.append("address", $("#address").val());
        fd.append("max_users", $("#max_users").val());
        fd.append("expired_at", $("#expired_at").val());
        fd.append("active", $("#active").val());
        fd.append("company", $("#id_company").val());
        fd.append("_method", "PUT");
        id = $("#id_company").val();
        $.ajax({
            type: "POST",
            url: "/company/" + id,
            data: fd,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                toast(response.type, response.message);
            },
        });
    });

    $(".deletecompany").click(function (e) {
        e.preventDefault();
        let idc = $(this).attr("company_id");
        if (confirm("bạn có chắc muốn xóa company")) {
            deleteItem("company", idc);
            $(this).closest(".company-row").remove();
        }
    });

    $(".delete-topic").click(function (e) {
        e.preventDefault();
        if (confirm("Bạn muốn xóa topic này ??")) {
            let id = $(this).attr("topic_slug");
            deleteItem("topic", id);
            $(this).closest(".topic-row").remove();
        }
    });

    $(".delete-tag").click(function (e) {
        e.preventDefault();
        if (confirm("Bạn muốn xóa tag này ??")) {
            let id = $(this).attr("tag_id");
            deleteItem("tag", id);
            $(this).closest(".tag-row").remove();
        }
    });
    $(".delete-post").click(function (e) {
        e.preventDefault();
        if (confirm("Bạn muốn xóa bài đăng này ??")) {
            let id = $(this).attr("post_id");
            deleteItem("post", id);
            $(this).closest(".post-row").remove();
        }
    });

    $('.pin-post').click(function (e) { 
        e.preventDefault();
        alert($(this).attr('data-id'));
    });

    $('#search-post').change(function (e) { 
        e.preventDefault();
        setTimeout(()=>{
            $('#searchForm').submit();
        },1000)
    });
});

function toast(type = "info", message = "") {
    const main = document.getElementById("toast");
    var color = "blue";
    icon = "fa-circle-info";
    switch (type) {
        case "success":
            color = "green";
            icon = "fa-circle-check";
            break;
        case "danger":
            color = "red";
            break;
        case "warning":
            color = "orange";
            break;
        case "info":
            color = "blue";
            break;
        default:
            icon = "fa-question";
    }
    if (main) {
        const toast = document.createElement("div");
        toast.innerHTML = `<div class="flex items-center toast-${color} max-w-sm  p-4 mb-4 text-gray-700 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 absolute right-64 top-24  toast" role="alert">
            <div class="" >
                    <i class="fa-solid ${icon} fz-24 icon-${color}"  ></i>
            </div>
            <div class="ml-3 text-base  "> ${message}</div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5   text-gray-700  hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
        </div>`;
        main.appendChild(toast);
        setTimeout(() => {
            main.removeChild(toast);
        }, 4000);
    }
}

function deleteMutiple(url, rowclass) {
    var allVals = [];
    console.log(allVals);
    $(".checkitem:checked").each(function () {
        allVals.push($(this).attr("data-id"));
    });
    if (allVals.length <= 0) {
        toast("warning", "Vui lòng chọn trường muốn xóa!!!");
    } else {
        dataid = "ids=" + allVals.join(",");
        $.ajax({
            type: "POST",
            url: url,
            data: dataid,
            dataType: "JSON",
            success: function (response) {
                toast(response.type, response.message);
            },
        });
        $.each(allVals, function (index, value) {
            $("." + rowclass)
                .filter("[data-id='" + value + "']")
                .remove();
        });
    }
}

function createFormUser(url) {
    let formdata = new FormData();
    formdata.append("name", $("#name").val());
    formdata.append("email", $("#email").val());
    formdata.append("role_id", $("#role").val());
    formdata.append("company", $("#company").val());
    formdata.append("dob", $("#dob").val());
    formdata.append("active", $("#active").val());
    formdata.append("id", $("#id").val());
    $.ajax({
        type: "POST",
        url: url,
        data: formdata,
        dataType: "JSON",
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            toast(response.type, response.message);
        },
    });
}

function deleteItem(typeItem, id) {
    $.ajax({
        type: "POST",
        url: typeItem + "/" + id,
        data: {
            typeItem: id,
            _method: "DELETE",
        },
        dataType: "JSON",
        success: function (response) {
            toast(response.type, response.message);
        },
    });
}

