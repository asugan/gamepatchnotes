const btn = document.querySelector("button.mobile-menu-button");
const menu = document.querySelector(".mobile-menu");
const container = $(".pncontainer");

btn.addEventListener("click", () => {
    menu.classList.toggle("hidden");
});

if (container.length) {
    var elems = document.getElementsByClassName("pncontainer")[0];

    var target = elems.innerHTML;
    elems.innerHTML = target
        .replace(/(<br)/gim, "<p")
        .replace(/<\/br>/gim, "</p>");
}

jQuery(document).ready(function () {
    jQuery("p").each(function () {
        var $this = jQuery(this);
        if ($this.html().replace(/\s|&nbsp;/g, "").length == 0) {
            $this.remove();
        }
    });
});
