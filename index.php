<?php
// Check if the 'page' parameter is set in the URL
if(isset($_GET['page'])) {
    // Function to sanitize user input (prevent directory traversal)
    if (!function_exists('sanitizePageParameter')) {
        function sanitizePageParameter($page) {
            return preg_replace('/[^a-zA-Z0-9\-_]/', '', $page); // Remove any characters except letters, numbers, hyphens, and underscores
        }
    }

    $page = sanitizePageParameter($_GET['page']);
    // Include the corresponding PHP file based on the 'page' parameter
    $filename = $page . '.php';
    if (file_exists($filename)) {
        include($filename);
    } else {
        // Handle page not found gracefully (redirect or display error message)
        // Example: header('Location: error.php');
        echo 'Page not found.';
        exit; // Terminate script execution after displaying the error message
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homepage | Health Care</title>
    <link rel="stylesheet" href="styles/initial-layout.css" />
    <link rel="stylesheet" href="styles/navbar-style.css" />
    <link rel="stylesheet" href="styles/footer-style.css" />
    <link rel="stylesheet" href="styles/landing/style.css" />
    <link rel="stylesheet" href="styles/landing/4k-style.css" />
    <link rel="stylesheet" href="styles/landing/tablet-screen-style.css" />
    <link rel="stylesheet" href="styles/landing/mobile-style.css" />

    <script
        src="https://kit.fontawesome.com/a0c784d1ee.js"
        crossorigin="anonymous"
    ></script>
</head>
<body>

<nav class="navbar">
    <div class="navbar__logo logo">
        <a href="index.php">
            <svg
                class="navbar__logo-icon logo-icon"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
            >
                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"
                />
            </svg>
        </a>
        <p class="navbar__logo-text logo-text">Find doctors nearby</p>
    </div>
    <svg
        xmlns="http://www.w3.org/2000/svg"
        class="navbar__menu-icon"
        viewBox="0 0 448 512"
    >
        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
        <path
            d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"
        />
    </svg>
    <a href="#" onclick="scrollToElement('action'); return false;" class="navbar__link-specialist">Find your specialist</a>

    <div class="navbar__phone">
        <div class="navbar__phone-icon-circle">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="navbar__phone-icon"
                viewBox="0 0 512 512"
            >
                <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"
                />
            </svg>
        </div>
        <div class="navbar__contact">
            <p class="navbar__consultations">Free consultations</p>
            <a href="#" class="navbar__phone-number">+xx (xxx) xxx-xx-xx</a>
        </div>
    </div>
</nav>

<div class="content">

    <section class="hero">
        <img
            src="icons/doctors-hero.svg"
            alt="Doctors"
            class="hero__doctors-img"
        />
        <h1 class="hero__heading heading">Find quality health care nearby</h1>
        <div class="hero__info">
            <p>Find top-rated doctors and specialists near you.</p>
            <a href="#" onclick="scrollToElement('action'); return false;" class="hero__cta-button cta"
            >Discover care providers</a
            >
        </div>
    </section>

    <section class="info">
        <h2 class="subheading">How does it work?</h2>
        <div class="info__cards-container">
            <div class="info__card">
                <img src="icons/medical-care.svg" class="info__card-img" alt="" />
                <h3>Step 1</h3>
                <p class="info__card-desc">Choose your specialty</p>
            </div>
            <div class="info__card">
                <img src="icons/location.svg" class="info__card-img" alt="" />
                <h3>Step 2</h3>
                <p class="info__card-desc">Specify the location</p>
            </div>
            <div class="info__card">
                <img src="icons/filter.svg" class="info__card-img" alt="" />
                <h3>Step 3</h3>
                <p class="info__card-desc">
                    Filter you search based on your preferences
                </p>
            </div>
            <div class="info__card">
                <img src="icons/doctors.svg" class="info__card-img" alt="" />
                <h3>Step 4</h3>
                <p class="info__card-desc">
                    Explore health care providers’ profiles
                </p>
            </div>
        </div>
        <a class="cta" href="#" onclick="scrollToElement('action'); return false;">Find your health care provider</a>
    </section>
    <section class="why-us">
        <h2>Why us?</h2>
        <div class="why-us__cards-container">
            <div class="why-us__card">
                <div class="why-us__card__content">
                    <div class="why-us__icon-container">
                        <svg
                            class="why-us__icon book-icon"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"
                        >
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M0 96C0 43 43 0 96 0H384h32c17.7 0 32 14.3 32 32V352c0 17.7-14.3 32-32 32v64c17.7 0 32 14.3 32 32s-14.3 32-32 32H384 96c-53 0-96-43-96-96V96zM64 416c0 17.7 14.3 32 32 32H352V384H96c-17.7 0-32 14.3-32 32zM208 112v48H160c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h48v48c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V224h48c8.8 0 16-7.2 16-16V176c0-8.8-7.2-16-16-16H272V112c0-8.8-7.2-16-16-16H224c-8.8 0-16 7.2-16 16z"
                            />
                        </svg>
                    </div>

                    <h3 class="why-us__title">Comprehensive directory</h3>
                    <p class="why-us__card__feature-details">
                        Our healthcare services directory provides a wide range of
                        medical care options within your specific region.
                    </p>
                    <p class="why-us__card__shortened-details">Learn more</p>
                </div>
            </div>
            <div class="why-us__card">
                <div class="why-us__card__content">
                    <div class="why-us__icon-container">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="why-us__icon check-icon"
                            viewBox="0 0 512 512"
                        >
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"
                            />
                        </svg>
                    </div>
                    <h3 class="why-us__title">Verified information</h3>
                    <p class="why-us__card__feature-details">
                        We verify and update listings regularly to provide the most
                        up-to-date information about healthcare providers, services, and
                        facilities.
                    </p>
                    <p class="why-us__card__shortened-details">Learn more</p>
                </div>
            </div>
            <div class="why-us__card">
                <div class="why-us__card__content">
                    <div class="why-us__icon-container">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="why-us__icon user-icon"
                            viewBox="0 0 448 512"
                        >
                            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path
                                d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"
                            />
                        </svg>
                    </div>
                    <h3 class="why-us__title">Easy-to-use</h3>
                    <p class="why-us__card__feature-details">
                        An intuitive interface allows visitors to easily navigate
                        through the directory and find the healthcare services they need
                        quickly and efficiently.
                    </p>
                    <p class="why-us__card__shortened-details">Learn more</p>
                </div>
            </div>
        </div>
    </section>
    <section class="action" id="action">
        <h2 class="subheading">Find your health care provider now!</h2>
        <form action="" method="get" class="action__form">
            <input type="hidden" name="page" value="info">
            <select
                id="service"
                name="service"
                class="action__form-select form-select"
            >
                <option value="" disabled selected>Service</option>
                <option value="dentist">Dentist</option>
                <option value="physician">Physician</option>
                <option value="cosmetologist">Cosmetologist</option>
            </select>
            <select
                id="location"
                name="location"
                class="action__form-select form-select"
            >
                <option value="" disabled selected>Location</option>
                <option value="germany">Germany</option>
                <option value="austria">Austria</option>
                <option value="italy">Italy</option>
            </select>
            <input type="submit" value="Find" class="action__submit cta" />
        </form>
    </section>
</div>
<div class="footer">
    <div class="logo">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="navbar__logo-icon"
            viewBox="0 0 512 512"
        >
            <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
            <path
                d="M228.3 469.1L47.6 300.4c-4.2-3.9-8.2-8.1-11.9-12.4h87c22.6 0 43-13.6 51.7-34.5l10.5-25.2 49.3 109.5c3.8 8.5 12.1 14 21.4 14.1s17.8-5 22-13.3L320 253.7l1.7 3.4c9.5 19 28.9 31 50.1 31H476.3c-3.7 4.3-7.7 8.5-11.9 12.4L283.7 469.1c-7.5 7-17.4 10.9-27.7 10.9s-20.2-3.9-27.7-10.9zM503.7 240h-132c-3 0-5.8-1.7-7.2-4.4l-23.2-46.3c-4.1-8.1-12.4-13.3-21.5-13.3s-17.4 5.1-21.5 13.3l-41.4 82.8L205.9 158.2c-3.9-8.7-12.7-14.3-22.2-14.1s-18.1 5.9-21.8 14.8l-31.8 76.3c-1.2 3-4.2 4.9-7.4 4.9H16c-2.6 0-5 .4-7.3 1.1C3 225.2 0 208.2 0 190.9v-5.8c0-69.9 50.5-129.5 119.4-141C165 36.5 211.4 51.4 244 84l12 12 12-12c32.6-32.6 79-47.5 124.6-39.9C461.5 55.6 512 115.2 512 185.1v5.8c0 16.9-2.8 33.5-8.3 49.1z"
            />
        </svg>
        <p class="footer__logo-text">Find doctors nearby</p>
    </div>
    <div class="footer__contacts-container">
        <div class="footer__policy">
            <a>Privacy policy</a>
            <a>Terms of service</a>
        </div>
        <div class="footer__contacts navbar__phone">
            <div class="footer__contact">
                <p>Contact</p>
                <a class="footer__phone-number">+xx (xxx) xxx-xx-xx</a>
                <a class="footer__gmail">health.now@gmail.com</a>
                <form action="./username.php" method="post">
                    <input type="text" name="username" id="username" placeholder="username"/>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function scrollToElement(id) {
        var element = document.getElementById(id);
        if (element) {
            element.scrollIntoView({
                behavior: "smooth",
                block: "start",
                inline: "nearest"
            });
        }
    }
</script>

</body>
</html>
