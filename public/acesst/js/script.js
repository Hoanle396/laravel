
    var slideIndex = 1;
    displaySlide(slideIndex);

    setInterval(function(){
        moveSlides(slideIndex);
    },2000);

    function moveSlides(n) {
        displaySlide(slideIndex += n);
    }

    function activeSlide(n) {
        displaySlide(slideIndex = n);
    }

    /* Main function */
    function displaySlide(n) {
        var i;
        var totalslides =
            document.getElementsByClassName("slide");

        if (n > totalslides.length) {
            slideIndex = 1;
        }

        if (n < 1) {
            slideIndex = totalslides.length;
        }
        for (i = 0; i < totalslides.length; i++) {
            totalslides[i].style.display = "none";
        }
        totalslides[slideIndex - 1].style.display = "block";
    }

