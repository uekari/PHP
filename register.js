// パスワードの表示・非表示処理
function pushHideButton() {
    var txtPass = document.getElementById("textPassword");
    var btnEye = document.getElementById("buttonEye");
    if (txtPass.type === "text") {
        txtPass.type = "password";
        btnEye.className = "fa fa-eye";
    } else {
        txtPass.type = "text";
        btnEye.className = "fa fa-eye-slash";
    }
}

// ページ離脱時にアラートを表示
window.addEventListener("beforeunload", function (e) {
    var confirmationMessage = "入力内容を破棄します。";
    e.returnValue = confirmationMessage;
    return confirmationMessage;
});