function togglePenggunaContent() {
    var penggunaContent = document.querySelector('.pengguna-content');
    var logoutContent = document.querySelector('.logout-content');
    var overlay = document.querySelector('.overlay');

    if (!penggunaContent || !logoutContent || !overlay) {
        console.error("Element(s) not found");
        return;
    }

    var isDisplayed = window.getComputedStyle(penggunaContent).getPropertyValue('display') !== 'none';

    if (!isDisplayed) {
        gsap.set(penggunaContent, { display: "block", opacity: 0, height: 0 });
        gsap.to(penggunaContent, { height: "auto", opacity: 1, duration: 0.3, onComplete: () => {
            gsap.set(logoutContent, { display: "block", opacity: 0, height: 0 });
            gsap.to(logoutContent, { height: "auto", opacity: 1, duration: 0.3 });
        }});
        overlay.style.display = "block";
        overlay.style.pointerEvents = "auto";
        overlay.addEventListener('click', hideContents);
    } else {
        gsap.to(logoutContent, { height: 0, opacity: 0, duration: 0.3, onComplete: () => {
            gsap.set(logoutContent, { display: "none" });
        }});
        gsap.to(penggunaContent, { height: 0, opacity: 0, duration: 0.3, onComplete: () => {
            gsap.set(penggunaContent, { display: "none" });
            overlay.style.display = "none";
            overlay.style.pointerEvents = "none";
            overlay.removeEventListener('click', hideContents);
        }});
    }
}

function hideContents() {
    var penggunaContent = document.querySelector('.pengguna-content');
    var logoutContent = document.querySelector('.logout-content');
    var overlay = document.querySelector('.overlay');

    gsap.to(logoutContent, { height: 0, opacity: 0, duration: 0.3, onComplete: () => {
        gsap.set(logoutContent, { display: "none" });
    }});
    gsap.to(penggunaContent, { height: 0, opacity: 0, duration: 0.3, onComplete: () => {
        gsap.set(penggunaContent, { display: "none" });
        overlay.style.display = "none";
        overlay.style.pointerEvents = "none";
        overlay.removeEventListener('click', hideContents);
    }});
}
