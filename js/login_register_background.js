// An array storing the URLs of the different images for campus events
const images = [
        "https://rawcdn.githack.com/naomikonlack/WEBTECHGITDEMO/3fc84d7ed2bee24937678f392d619e3c96da698f/Valentine's_Day_celebr.png",
        "https://rawcdn.githack.com/naomikonlack/WEBTECHGITDEMO/3fc84d7ed2bee24937678f392d619e3c96da698f/wellness_day_at_Ashesi_.png",
        "https://rawcdn.githack.com/naomikonlack/WEBTECHGITDEMO/3fc84d7ed2bee24937678f392d619e3c96da698f/sports_day_event_at_Ashesi.png",
        "https://rawcdn.githack.com/naomikonlack/WEBTECHGITDEMO/3fc84d7ed2bee24937678f392d619e3c96da698f/outdoor.png",
        "https://rawcdn.githack.com/naomikonlack/WEBTECHGITDEMO/3fc84d7ed2bee24937678f392d619e3c96da698f/lively_debate_c.png",
        "https://rawcdn.githack.com/naomikonlack/WEBTECHGITDEMO/3fc84d7ed2bee24937678f392d619e3c96da698f/event_login_background_image.png",
        "https://rawcdn.githack.com/naomikonlack/WEBTECHGITDEMO/3fc84d7ed2bee24937678f392d619e3c96da698f/evening_cultural_gala_at_A.png",
        "https://rawcdn.githack.com/naomikonlack/WEBTECHGITDEMO/3fc84d7ed2bee24937678f392d619e3c96da698f/dance_event_at_.png",
        "https://rawcdn.githack.com/naomikonlack/WEBTECHGITDEMO/3fc84d7ed2bee24937678f392d619e3c96da698f/culturalday.png",
        "https://rawcdn.githack.com/naomikonlack/WEBTECHGITDEMO/3fc84d7ed2bee24937678f392d619e3c96da698f/a_music_a.png",
        "https://rawcdn.githack.com/naomikonlack/WEBTECHGITDEMO/3fc84d7ed2bee24937678f392d619e3c96da698f/a_'Crazy_Day'.png",
        "https://rawcdn.githack.com/naomikonlack/WEBTECHGITDEMO/3fc84d7ed2bee24937678f392d619e3c96da698f/_'Twin_Day'_event_at_Ash.png",
        "https://rawcdn.githack.com/naomikonlack/WEBTECHGITDEMO/3fc84d7ed2bee24937678f392d619e3c96da698f/'Crazy_Day'.png",
        "https://rawcdn.githack.com/naomikonlack/WEBTECHGITDEMO/3fc84d7ed2bee24937678f392d619e3c96da698f/'Twin_Day'_event_at_Ash.png"
    ];

    // A variable keeping track of the current index for pairs of images
    let currentIndex = 0;

    // A function to update the background images on the left and right sides of the webpage
    function updateBackgroundImages(index1, index2) {
        // Finding the left and right elements on the webpage and setting their background images
        document.querySelector('.bg-image.left').style.backgroundImage = `url('${images[index1]}')`;
        document.querySelector('.bg-image.right').style.backgroundImage = `url('${images[index2]}')`;
    }

    // A function changing the background images
    function changeBackgroundImages() {
        // Identifying the indices for the next pair of images in the array
        const nextIndex1 = currentIndex;
        const nextIndex2 = (currentIndex + 1) % images.length;

    // Creating two Image objects to load the next pair of images
    const img1 = new Image();
    const img2 = new Image();
    let loadedCount = 0; // Keeping track of how many images have been loaded

    // A callback function executing when the images are fully loaded
    const onImageLoad = () => {
        loadedCount++;
        // Once both images are loaded, updating the background images
        if (loadedCount === 2) {
            updateBackgroundImages(nextIndex1, nextIndex2);
        }
    };

    // Setting up event handlers to trigger onImageLoad when images are loaded
    img1.onload = onImageLoad;
    img2.onload = onImageLoad;

    // Setting the source URLs for the Image objects, initiating the image loading process
    img1.src = images[nextIndex1];
    img2.src = images[nextIndex2];

    // Updating currentIndex to point to the next pair of images for the next iteration
    currentIndex = (currentIndex + 2) % images.length;
}

// Initial call to set the background with the first pair of images
changeBackgroundImages();

// Changing background images every 10 seconds (10000 milliseconds)
setInterval(changeBackgroundImages, 10000);
