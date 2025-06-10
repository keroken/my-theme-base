<?php
/**
 * Template Name: Find Your City
 */

get_header(); ?>

<div class="find-your-city-container">
    <div class="map-container">
        <div id="canada-map" style="height: 600px; width: 100%;"></div>
    </div>
    <div class="city-info" id="city-info">
        <h2>Select a City</h2>
        <p>Click on a city marker to view more information.</p>
    </div>
</div>

<style>
.find-your-city-container {
    display: flex;
    gap: 2rem;
    padding: 2rem;
    max-width: 1200px;
    margin: 0 auto;
}

.map-container {
    flex: 2;
    min-height: 600px;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
}

#canada-map {
    height: 100%;
    width: 100%;
    z-index: 1;
}

.city-info {
    flex: 1;
    padding: 1.5rem;
    background: #f5f5f5;
    border-radius: 8px;
}

.city-info h2 {
    margin-top: 0;
    color: #333;
}

.city-info p {
    color: #666;
}

.city-details {
    display: none;
}

.city-details.active {
    display: block;
}

.city-details h3 {
    margin-top: 0;
    color: #333;
}

.city-details .contact-info {
    margin: 1rem 0;
}

.city-details .social-links {
    display: flex;
    gap: 1rem;
    margin-top: 1rem;
}

.city-details .social-links a {
    color: #666;
    text-decoration: none;
}

.city-details .social-links a:hover {
    color: #333;
}

/* Ensure Leaflet map tiles are visible */
.leaflet-container {
    height: 100%;
    width: 100%;
}

.leaflet-tile-pane {
    opacity: 1;
}
</style>

<!-- Load Leaflet CSS first -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
<!-- Then load Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize the map
    const map = L.map('canada-map', {
        center: [56.1304, -106.3468],
        zoom: 4,
        zoomControl: true
    });
    
    // Add the tile layer (OpenStreetMap)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors',
        maxZoom: 19
    }).addTo(map);

    // City data
    const cities = [
        {
            name: 'Vancouver',
            lat: 49.2827,
            lng: -123.1207,
            contact: '604-555-1234',
            email: 'vancouver@example.com',
            website: 'https://vancouver.example.com',
            social: {
                facebook: 'https://facebook.com/vancouver',
                twitter: 'https://twitter.com/vancouver',
                instagram: 'https://instagram.com/vancouver'
            }
        },
        {
            name: 'Toronto',
            lat: 43.6532,
            lng: -79.3832,
            contact: '416-555-1234',
            email: 'toronto@example.com',
            website: 'https://toronto.example.com',
            social: {
                facebook: 'https://facebook.com/toronto',
                twitter: 'https://twitter.com/toronto',
                instagram: 'https://instagram.com/toronto'
            }
        },
        {
            name: 'Montreal',
            lat: 45.5017,
            lng: -73.5673,
            contact: '514-555-1234',
            email: 'montreal@example.com',
            website: 'https://montreal.example.com',
            social: {
                facebook: 'https://facebook.com/montreal',
                twitter: 'https://twitter.com/montreal',
                instagram: 'https://instagram.com/montreal'
            }
        }
    ];

    // Add markers for each city
    cities.forEach(city => {
        const marker = L.marker([city.lat, city.lng])
            .addTo(map)
            .bindPopup(city.name);

        marker.on('click', function() {
            showCityInfo(city);
        });
    });

    function showCityInfo(city) {
        const cityInfo = document.getElementById('city-info');
        cityInfo.innerHTML = `
            <div class="city-details active">
                <h3>${city.name}</h3>
                <div class="contact-info">
                    <p><strong>Contact:</strong> ${city.contact}</p>
                    <p><strong>Email:</strong> ${city.email}</p>
                    <p><strong>Website:</strong> <a href="${city.website}" target="_blank">${city.website}</a></p>
                </div>
                <div class="social-links">
                    <a href="${city.social.facebook}" target="_blank">Facebook</a>
                    <a href="${city.social.twitter}" target="_blank">Twitter</a>
                    <a href="${city.social.instagram}" target="_blank">Instagram</a>
                </div>
            </div>
        `;
    }

    // Force a resize event to ensure the map renders properly
    setTimeout(() => {
        map.invalidateSize();
    }, 100);
});
</script>

<?php get_footer(); ?> 