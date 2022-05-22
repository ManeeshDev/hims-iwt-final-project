
export const setRandomImgToPolicyForm = () => {
    if ((document.URL).includes('policy.php')) {
        const rndNo = Math.floor(Math.random() * 4) + 1;
        document.querySelector('.buy-policy-form>.policy-form-l-bg').style.backgroundImage = "url(../images/policy-form-img-" + rndNo + ".svg)";
    }
    return false;
}

export const clientFormRequiredCheck = () => {
    [...document.querySelectorAll("#clientForm [required]")].forEach(elem => {
        document.querySelector("#submitProfile").addEventListener("click", (event) => {
            if (!elem.value || elem.value == " " || elem.value == undefined) {
                elem.style.border = "1px solid red";
            } else {
                elem.style.border = "1px solid var(--primary)";
            }
        });
        elem.addEventListener("input", () => {
            if (!elem.value || elem.value == " " || elem.value == undefined) {
                elem.style.border = "1px solid red";
            } else {
                elem.style.border = "1px solid var(--primary)";
            }
        });
        elem.addEventListener("change", () => {
            if (!elem.value || elem.value == " " || elem.value == undefined) {
                elem.style.border = "1px solid red";
            } else {
                elem.style.border = "1px solid var(--primary)";
            }
        });
        elem.addEventListener("blur", () => {
            if (!elem.value || elem.value == " " || elem.value == undefined) {
                elem.style.border = "1px solid red";
            } else {
                elem.style.border = "1px solid var(--primary)";
            }
        });
    });
}