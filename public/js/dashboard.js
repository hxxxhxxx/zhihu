$(function () {

    // 用户管理列表用户头像弹出框
    $('.admin-users-avatar').parent('a').click(function () {
        event.preventDefault();
        $('.user-avatar-modal').modal();
    });
});