function toggleMatematikaContent() {
    var matematikaContent = document.querySelector('.matematika-content');

    // Toggle the visibility of the content
    if (matematikaContent.style.display === "block") {
        gsap.to(matematikaContent, { height: 0, opacity: 0, duration: 0.5, display: "none" });
    } else {
        gsap.set(matematikaContent, { display: "block" }); // Set display to block before animating
        gsap.to(matematikaContent, { height: "auto", opacity: 1, duration: 0.5 });
    }
}
