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
        zoomControl: true,
        minZoom: 4,
        maxZoom: 19
    });
    
    // Add the tile layer (OpenStreetMap)
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors',
        maxZoom: 19
    }).addTo(map);

    // City data
    const cities = [
        // British Columbia
        {
            name: 'Victoria',
            lat: 48.4284,
            lng: -123.3656,
            contact: '250-555-1234',
            email: 'victoria@example.com',
            website: 'https://victoria.example.com',
            social: {
                facebook: 'https://facebook.com/victoria',
                twitter: 'https://twitter.com/victoria',
                instagram: 'https://instagram.com/victoria'
            }
        },
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
            name: 'Surrey',
            lat: 49.1913,
            lng: -122.8490,
            contact: '604-555-1234',
            email: 'surrey@example.com',
            website: 'https://surrey.example.com',
            social: {
                facebook: 'https://facebook.com/surrey',
                twitter: 'https://twitter.com/surrey',
                instagram: 'https://instagram.com/surrey'
            }
        },
        {
            name: 'Kelowna',
            lat: 49.8877,
            lng: -119.4960,
            contact: '250-555-1234',
            email: 'kelowna@example.com',
            website: 'https://kelowna.example.com',
            social: {
                facebook: 'https://facebook.com/kelowna',
                twitter: 'https://twitter.com/kelowna',
                instagram: 'https://instagram.com/kelowna'
            }
        },
        {
            name: 'Kamloops',
            lat: 50.6745,
            lng: -120.3273,
            contact: '250-555-1234',
            email: 'kamloops@example.com',
            website: 'https://kamloops.example.com',
            social: {
                facebook: 'https://facebook.com/kamloops',
                twitter: 'https://twitter.com/kamloops',
                instagram: 'https://instagram.com/kamloops'
            }
        },
        // Alberta
        {
            name: 'Calgary',
            lat: 51.0447,
            lng: -114.0719,
            contact: '403-555-1234',
            email: 'calgary@example.com',
            website: 'https://calgary.example.com',
            social: {
                facebook: 'https://facebook.com/calgary',
                twitter: 'https://twitter.com/calgary',
                instagram: 'https://instagram.com/calgary'
            }
        },
        {
            name: 'Edmonton',
            lat: 53.5461,
            lng: -113.4938,
            contact: '780-555-1234',
            email: 'edmonton@example.com',
            website: 'https://edmonton.example.com',
            social: {
                facebook: 'https://facebook.com/edmonton',
                twitter: 'https://twitter.com/edmonton',
                instagram: 'https://instagram.com/edmonton'
            }
        },
        // Saskatchewan
        {
            name: 'Regina',
            lat: 50.4452,
            lng: -104.6189,
            contact: '306-555-1234',
            email: 'regina@example.com',
            website: 'https://regina.example.com',
            social: {
                facebook: 'https://facebook.com/regina',
                twitter: 'https://twitter.com/regina',
                instagram: 'https://instagram.com/regina'
            }
        },
        {
            name: 'Saskatoon',
            lat: 52.1332,
            lng: -106.6700,
            contact: '306-555-1234',
            email: 'saskatoon@example.com',
            website: 'https://saskatoon.example.com',
            social: {
                facebook: 'https://facebook.com/saskatoon',
                twitter: 'https://twitter.com/saskatoon',
                instagram: 'https://instagram.com/saskatoon'
            }
        },
        // Manitoba
        {
            name: 'Winnipeg',
            lat: 49.8951,
            lng: -97.1384,
            contact: '204-555-1234',
            email: 'winnipeg@example.com',
            website: 'https://winnipeg.example.com',
            social: {
                facebook: 'https://facebook.com/winnipeg',
                twitter: 'https://twitter.com/winnipeg',
                instagram: 'https://instagram.com/winnipeg'
            }
        },
        // Ontario
        {
            name: 'Kitchener-Waterloo',
            lat: 43.4516,
            lng: -80.4925,
            contact: '519-555-1234',
            email: 'kw@example.com',
            website: 'https://kw.example.com',
            social: {
                facebook: 'https://facebook.com/kitchenerwaterloo',
                twitter: 'https://twitter.com/kitchenerwaterloo',
                instagram: 'https://instagram.com/kitchenerwaterloo'
            }
        },
        {
            name: 'Guelph',
            lat: 43.5448,
            lng: -80.2482,
            contact: '519-555-1234',
            email: 'guelph@example.com',
            website: 'https://guelph.example.com',
            social: {
                facebook: 'https://facebook.com/guelph',
                twitter: 'https://twitter.com/guelph',
                instagram: 'https://instagram.com/guelph'
            }
        },
        {
            name: 'Hamilton',
            lat: 43.5890,
            lng: -79.6441,
            contact: '905-555-1234',
            email: 'hamilton@example.com',
            website: 'https://hamilton.example.com',
            social: {
                facebook: 'https://facebook.com/hamilton',
                twitter: 'https://twitter.com/hamilton',
                instagram: 'https://instagram.com/hamilton'
            }
        },
        {
            name: 'Brantford',
            lat: 43.1394,
            lng: -80.2644,
            contact: '519-555-1234',
            email: 'brantford@example.com',
            website: 'https://brantford.example.com',
            social: {
                facebook: 'https://facebook.com/brantford',
                twitter: 'https://twitter.com/brantford',
                instagram: 'https://instagram.com/brantford'
            }
        },
        {
            name: 'London',
            lat: 42.9849,
            lng: -81.2453,
            contact: '519-555-1234',
            email: 'london@example.com',
            website: 'https://london.example.com',
            social: {
                facebook: 'https://facebook.com/london',
                twitter: 'https://twitter.com/london',
                instagram: 'https://instagram.com/london'
            }
        },
        {
            name: 'Niagara',
            lat: 43.0896,
            lng: -79.0849,
            contact: '905-555-1234',
            email: 'niagara@example.com',
            website: 'https://niagara.example.com',
            social: {
                facebook: 'https://facebook.com/niagara',
                twitter: 'https://twitter.com/niagara',
                instagram: 'https://instagram.com/niagara'
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
            name: 'Ottawa',
            lat: 45.4215,
            lng: -75.6972,
            contact: '613-555-1234',
            email: 'ottawa@example.com',
            website: 'https://ottawa.example.com',
            social: {
                facebook: 'https://facebook.com/ottawa',
                twitter: 'https://twitter.com/ottawa',
                instagram: 'https://instagram.com/ottawa'
            }
        },
        // Quebec
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
        },
        {
            name: 'Sherbrooke',
            lat: 45.4000,
            lng: -71.8990,
            contact: '819-555-1234',
            email: 'sherbrooke@example.com',
            website: 'https://sherbrooke.example.com',
            social: {
                facebook: 'https://facebook.com/sherbrooke',
                twitter: 'https://twitter.com/sherbrooke',
                instagram: 'https://instagram.com/sherbrooke'
            }
        },
        // Nova Scotia
        {
            name: 'Halifax',
            lat: 44.6488,
            lng: -63.5752,
            contact: '902-555-1234',
            email: 'halifax@example.com',
            website: 'https://halifax.example.com',
            social: {
                facebook: 'https://facebook.com/halifax',
                twitter: 'https://twitter.com/halifax',
                instagram: 'https://instagram.com/halifax'
            }
        }
    ];

    // Create a layer group for all markers
    const markers = L.layerGroup().addTo(map);

    // Add markers for each city and collect their bounds
    const bounds = L.latLngBounds([]);
    cities.forEach(city => {
        const marker = L.marker([city.lat, city.lng])
            .bindPopup(city.name);
        markers.addLayer(marker);
        
        // Add marker position to bounds
        bounds.extend([city.lat, city.lng]);

        marker.on('click', function() {
            showCityInfo(city);
        });
    });

    // Fit the map to show all markers with some padding
    map.fitBounds(bounds, {
        padding: [50, 50], // Add padding around the bounds
        maxZoom: 6 // Limit the maximum zoom level when fitting bounds
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
});
</script>

<?php get_footer(); ?> 