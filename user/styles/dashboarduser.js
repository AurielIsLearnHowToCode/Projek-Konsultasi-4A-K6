function toggleMatematikaContent() {
    var matematikaContent = document.querySelector('.matematika-content');


    var isDisplayed = window.getComputedStyle(matematikaContent).getPropertyValue('display') !== 'none';

    if (!isDisplayed) {

        gsap.set(matematikaContent, { display: "block", opacity: 0, height: 0 });
        gsap.to(matematikaContent, { height: "auto", opacity: 1, duration: 0.7 });
    } else {

        gsap.to(matematikaContent, { height: 0, opacity: 0, duration: 0.7, onComplete: () => {
            gsap.set(matematikaContent, { display: "none" });
        } });
    }
}
function toggleMatematikaContent2() {
    var matematikaContent2 = document.querySelector('.matematika2-content');


    var isDisplayed = window.getComputedStyle(matematikaContent2).getPropertyValue('display') !== 'none';

    if (!isDisplayed) {

        gsap.set(matematikaContent2, { display: "block", opacity: 0, height: 0 });
        gsap.to(matematikaContent2, { height: "auto", opacity: 1, duration: 0.7 });
    } else {

        gsap.to(matematikaContent2, { height: 0, opacity: 0, duration: 0.7, onComplete: () => {
            gsap.set(matematikaContent2, { display: "none" });
        } });
    }
}

function toggleMatematikaContent3() {
    var matematikaContent3 = document.querySelector('.matematika3-content');


    var isDisplayed = window.getComputedStyle(matematikaContent3).getPropertyValue('display') !== 'none';

    if (!isDisplayed) {

        gsap.set(matematikaContent3, { display: "block", opacity: 0, height: 0 });
        gsap.to(matematikaContent3, { height: "auto", opacity: 1, duration: 0.7 });
    } else {

        gsap.to(matematikaContent3, { height: 0, opacity: 0, duration: 0.7, onComplete: () => {
            gsap.set(matematikaContent3, { display: "none" });
        } });
    }
}

function togglebindoContent() {
    var bindoContent = document.querySelector('.bindo-content');


    var isDisplayed = window.getComputedStyle(bindoContent).getPropertyValue('display') !== 'none';

    if (!isDisplayed) {

        gsap.set(bindoContent, { display: "block", opacity: 0, height: 0 });
        gsap.to(bindoContent, { height: "auto", opacity: 1, duration: 0.7 });
    } else {

        gsap.to(bindoContent, { height: 0, opacity: 0, duration: 0.7, onComplete: () => {
            gsap.set(bindoContent, { display: "none" });
        } });
    }
}

function togglebindo2Content() {
    var bindo2Content = document.querySelector('.bindo2-content');


    var isDisplayed = window.getComputedStyle(bindo2Content).getPropertyValue('display') !== 'none';

    if (!isDisplayed) {

        gsap.set(bindo2Content, { display: "block", opacity: 0, height: 0 });
        gsap.to(bindo2Content, { height: "auto", opacity: 1, duration: 0.7 });
    } else {

        gsap.to(bindo2Content, { height: 0, opacity: 0, duration: 0.7, onComplete: () => {
            gsap.set(bindo2Content, { display: "none" });
        } });
    }
}
