<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JioTV Plus</title>
    <style>

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #333;
            color: #ffffff;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            text-align: center;
            font-size: 16px;
            line-height: 1.6;
        }

        header {
            background-color: #222;
            color: #ffffff;
            padding: 1em 0;
            box-sizing: border-box;
            font-size: 2em;
            border-bottom: 2px solid #444;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        header img {
            width: 50px;
            margin-right: 10px;
        }

        header h1 {
            margin: 0;
            font-size: 0.8em;
        }

        nav {
            margin-bottom: 20px;
            text-align: center; /* Center-align the text in the navigation */
        }

        select {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #3498db;
            border-radius: 20px; /* Add border-radius to the dropdown */
            cursor: pointer;
            outline: none;
            transition: border-color 0.3s ease;
            text-align-last: center; /* Center-align text within the select element */
        }

        select:hover,
        select:focus {
            border-color: #2c3e50;
        }

        .container {
            max-width: 1800px;
            margin: 0 auto;
            padding: 15px;
            box-sizing: border-box;
        }

        .site-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); /* Adjusted grid size */
            gap: 15px;
            margin-top: 15px;
        }

        .site-card {
            background-color: #444;
            border: 1px solid #333;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            text-decoration: none;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            max-width: 150px; /* Set a maximum width for the site card */
            margin: auto; /* Center the site card within its container */
        }

        .site-card:hover {
            transform: scale(1.05);
        }

        .site-card img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-bottom: 1px solid #333;
        }

        .site-info {
            padding: 10px; /* Reduce padding for the site info */
            text-align: center;
            flex-grow: 1;
        }

        .site-info h2 {
            font-size: 0.9em; /* Adjust the font size for the channel name (h2) */
            margin: 0;
        }

        .site-link {
            margin-top: 10px;
            color: #ffffff;
            text-decoration: none;
            background-color: #3498db;
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }

        .site-link:hover {
            background-color: #2c3e50;
            color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .github-button {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            font-size:16px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .github-button:hover {
            background-color: #45a049;
        }

        .github-icon {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        .telegram-button {
            display: inline-flex;
            align-items: center;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            background-color: #0088cc; /* Use the color you prefer for Telegram */
            border-radius: 5px;
            margin-left: 10px; /* Adjust the margin as needed */
            transition: background-color 0.3s ease;
        }

        .telegram-button:hover {
            background-color: #006699; /* Adjust the hover color as needed */
        }

        .telegram-icon {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }

        /* Modern Search Bar Styles */


        #channel-search {
            padding: 10px;
            border: none; /* Remove border to create a seamless appearance */
            border-radius: 20px; /* Match the border-radius of the container */
            width: 70%; /* Adjusted width for better visibility on small screens */
            font-size: 16px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        #channel-search:focus {
            outline: none;
            background-color: #eee; /* Change background color when focused */
        }

        #search-btn {
            background-color: #3498db;
            color: #ffffff;
            border: none;
            cursor: pointer;
            border-radius: 20px; /* Add border-radius to the search button */
            padding: 10px 20px; /* Add padding to the search button */
            transition: background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease;
        }

        #search-btn:hover {
            background-color: #2c3e50;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        #search-icon {
            font-size: 20px;
            color: #3498db;
            transition: color 0.3s ease;
        }
    </style>
</head>

<body>


    <header>
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8a/Jio_TV_logo.svg/1200px-Jio_TV_logo.svg.png" alt="JioTV Logo">
        <h1>JioTV-Plus</h1>
    </header>

    <div class="container">
        <div id="search-bar">
            <input type="text" id="channel-search" oninput="searchChannels()" placeholder="Enter channel name...">
            <button id="search-btn" onclick="searchChannels()">Search</button>
        </div>

        <!-- PHP code to iterate over JSON data -->
        <?php
        // Load the JSON data
        $jsonString = file_get_contents('channels.json');
        $jsonDataChannel = json_decode($jsonString, true);

        // Check if the JSON data is an array
        if (is_array($jsonDataChannel)) {
            $channelsData = $jsonDataChannel; // The JSON is an array of channels
        } else {
            $channelsData = []; // If JSON is not an array, set channelsData to an empty array
        }
        ?>

        <div class="site-grid">
            <?php foreach ($channelsData as $channel): ?>
                <div class="site-card" data-group="<?php echo htmlspecialchars($channel['genre'], ENT_QUOTES, 'UTF-8'); ?>">
                    <a href="player.php?id=<?php echo htmlspecialchars($channel['id'], ENT_QUOTES, 'UTF-8'); ?>" class="site-card">
                        <img src="<?php echo htmlspecialchars($channel['logo'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($channel['name'], ENT_QUOTES, 'UTF-8'); ?>">
                        <div class="site-info">
                            <h2><?php echo htmlspecialchars($channel['name'], ENT_QUOTES, 'UTF-8'); ?></h2>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        // Function to store the selected group in localStorage
        function saveSelectedGroup(selectedGroup) {
            localStorage.setItem('selectedGroup', selectedGroup);
        }

        // Function to retrieve the stored selected group from localStorage
        function getStoredSelectedGroup() {
            return localStorage.getItem('selectedGroup');
        }

        document.addEventListener("DOMContentLoaded", function () {
            // Show loading screen
            const loadingScreen = document.getElementById('loading-screen');
            loadingScreen.style.display = 'flex';

            // Update the progress bar width
            const loadingBar = document.getElementById('loading-bar');
            loadingBar.style.width = '100%';

            // Hide loading screen after a delay (adjust as needed)
            setTimeout(function () {
                loadingScreen.style.display = 'none';
            }, 1000); // 1000 milliseconds = 1 second

            // Check if there is a stored selected group
            const storedSelectedGroup = getStoredSelectedGroup();
            if (storedSelectedGroup) {
                // Set the selected group in the dropdown
                const selectElement = document.getElementById('channel-dropdown');
                selectElement.value = storedSelectedGroup;

                // Trigger the changeChannelGroup function with the stored value
                changeChannelGroup();
            } else {
                // Trigger the changeChannelGroup function with the default value
                changeChannelGroup();
            }
        });

        function searchChannels() {
            const input = document.getElementById('channel-search').value.toLowerCase();
            const allSiteCards = document.querySelectorAll('.site-card');

            allSiteCards.forEach(card => {
                const channelName = card.querySelector('.site-info h2').innerText.toLowerCase();
                const displayStyle = channelName.includes(input) ? 'flex' : 'none';
                card.style.display = displayStyle;
            });

            // Show all genre-specific channel grids
            const genreGrids = document.querySelectorAll('.site-grid');
            genreGrids.forEach(grid => {
                grid.style.display = 'grid';
            });
        }

        function changeChannelGroup() {
            const selectElement = document.getElementById('channel-dropdown');
            const selectedGroup = selectElement.options[selectElement.selectedIndex].value;

            // Save the selected group to localStorage
            saveSelectedGroup(selectedGroup);

            // Hide all site cards
            const allSiteCards = document.querySelectorAll('.site-card');
            allSiteCards.forEach(card => {
                card.style.display = 'none';
            });

            // Show site cards of the selected group
            const selectedCards = document.querySelectorAll(`.site-card[data-group="${selectedGroup}"]`);
            selectedCards.forEach(card => {
                card.style.display = 'flex';
            });
        }
    </script>
</body>
</html>