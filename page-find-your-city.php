<?php
/**
 * Template Name: Find Your City
 */

get_header(); ?>

<div class="front-bg">
    <div class="find-your-city-container">
        <div class="map-container">
            <div id="canada-map" style="height: 600px; width: 100%;"></div>
        </div>
        <div class="city-info" id="city-info">
            <h2>Select a City</h2>
            <p>Click on a city marker to view more information.</p>
        </div>
    </div>
</div>

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
            staff_name: 'Sandi Mcdougall',
            email: 'sandi.mcdougall@ismc.ca',
            website: '',
            social: {
                facebook: '',
                twitter: '',
                instagram: ''
            }
        },
        {
            name: 'Vancouver',
            lat: 49.2827,
            lng: -123.1207,
            staff_name: 'Izumi Araki',
            email: 'izumi.araki@ismc.ca',
            website: '',
            social: {
                facebook: '',
                twitter: '',
                instagram: ''
            }
        },
        {
            name: 'Surrey',
            lat: 49.1913,
            lng: -122.8490,
            staff_name: 'Jessica Mamouler',
            email: 'jessica.mamouler@ismc.ca',
            website: '',
            social: {
                facebook: '',
                twitter: '',
                instagram: ''
            }
        },
        {
            name: 'Kelowna',
            lat: 49.8877,
            lng: -119.4960,
            staff_name: 'Rick Wilgosh',
            email: 'rick.wilgosh@ismc.ca',
            website: '',
            social: {
                facebook: 'https://www.facebook.com/utalkspage/',
                twitter: '',
                instagram: ''
            }
        },
        {
            name: 'Kamloops',
            lat: 50.6745,
            lng: -120.3273,
            staff_name: 'Jeff Torrans',
            email: 'jeff.torrans@ismc.ca',
            website: '',
            social: {
                facebook: 'https://www.facebook.com/groups/FocusClubTRU/',
                twitter: '',
                instagram: ''
            }
        },
        // Alberta
        {
            name: 'Calgary',
            lat: 51.0447,
            lng: -114.0719,
            staff_name: 'Cleuber De Sousa',
            email: 'cleuber.desousa@ismc.ca',
            website: '',
            social: {
                facebook: '',
                twitter: '',
                instagram: ''
            }
        },
        {
            name: 'Edmonton',
            lat: 53.5461,
            lng: -113.4938,
            staff_name: 'Gary Short',
            email: 'gary.short@ismc.ca',
            website: '',
            social: {
                facebook: '',
                twitter: '',
                instagram: ''
            }
        },
        // Saskatchewan
        {
            name: 'Regina',
            lat: 50.4452,
            lng: -104.6189,
            staff_name: 'Leighton Gust',
            email: 'leighton.gust@ismc.ca',
            website: '',
            social: {
                facebook: '',
                twitter: '',
                instagram: ''
            }
        },
        {
            name: 'Saskatoon',
            lat: 52.1332,
            lng: -106.6700,
            staff_name: 'Cam Janzen',
            email: 'cam.janzen@ismc.ca',
            website: '',
            social: {
                facebook: '',
                twitter: '',
                instagram: ''
            }
        },
        // Manitoba
        {
            name: 'Winnipeg',
            lat: 49.8951,
            lng: -97.1384,
            staff_name: 'Frieda Martens',
            email: 'frieda.martens@ismc.ca',
            website: '',
            social: {
                facebook: '',
                twitter: '',
                instagram: ''
            }
        },
        // Ontario
        {
            name: 'Kitchener-Waterloo',
            lat: 43.4516,
            lng: -80.4925,
            staff_name: 'Dorothy Tam',
            email: 'dorothy.tam@ismc.ca',
            website: '',
            social: {
                facebook: '',
                twitter: '',
                instagram: ''
            }
        },
        {
            name: 'Guelph',
            lat: 43.5448,
            lng: -80.2482,
            staff_name: 'Karen Ting',
            email: '',
            website: 'https://www.guelphinternationalstudents.com',
            social: {
                facebook: '',
                twitter: '',
                instagram: 'https://www.instagram.com/guelphinternationalstudents/'
            }
        },
        {
            name: 'Hamilton',
            lat: 43.5890,
            lng: -79.6441,
            staff_name: 'Peter Scholtens',
            email: '',
            website: 'https://events.helpinginternationalstudents.com/hamilton',
            social: {
                facebook: '',
                twitter: '',
                instagram: 'https://www.instagram.com/hamiltoninternationalstudents/'
            }
        },
        {
            name: 'Brantford',
            lat: 43.1394,
            lng: -80.2644,
            staff_name: 'Jason Keuning',
            email: 'jason.keuning@ismc.ca',
            website: '',
            social: {
                facebook: '',
                twitter: '',
                instagram: ''
            }
        },
        {
            name: 'London',
            lat: 42.9849,
            lng: -81.2453,
            staff_name: 'Stuart Smith',
            email: '',
            website: 'https://www.londoninternationalstudents.com',
            social: {
                facebook: '',
                twitter: '',
                instagram: 'https://www.instagram.com/london_international_students/'
            }
        },
        {
            name: 'Niagara',
            lat: 43.0896,
            lng: -79.0849,
            staff_name: 'Hilda Vanderklippe',
            email: '',
            website: 'https://www.niagarainternationalstudents.com',
            social: {
                facebook: '',
                twitter: '',
                instagram: 'https://www.instagram.com/niagarainternationalstudents/'
            }
        },
        {
            name: 'Toronto',
            lat: 43.6532,
            lng: -79.3832,
            staff_name: 'Pin Wong',
            email: '',
            website: 'https://events.helpinginternationalstudents.com/toronto',
            social: {
                facebook: '',
                twitter: '',
                instagram: ''
            }
        },
        {
            name: 'Ottawa',
            lat: 45.4215,
            lng: -75.6972,
            staff_name: 'Vinu Rajus',
            email: 'vinu.rajus@ismc.ca',
            website: '',
            social: {
                facebook: '',
                twitter: '',
                instagram: ''
            }
        },
        // Quebec
        {
            name: 'Montreal',
            lat: 45.5017,
            lng: -73.5673,
            staff_name: 'Belinda Tam',
            email: '',
            website: 'https://www.montrealinternationalstudents.com/',
            social: {
                facebook: '',
                twitter: '',
                instagram: 'https://www.instagram.com/internationalstudentsmontreal'
            }
        },
        {
            name: 'Sherbrooke',
            lat: 45.4000,
            lng: -71.8990,
            staff_name: 'Andrey Cañas',
            email: '',
            website: '',
            social: {
                facebook: '',
                twitter: '',
                instagram: 'https://www.instagram.com/sherbrooke.int.students/'
            }
        },
        // Nova Scotia
        {
            name: 'Halifax',
            lat: 44.6488,
            lng: -63.5752,
            staff_name: 'Chi Perrie',
            email: '',
            website: 'https://ismchalifax.ca/',
            social: {
                facebook: '',
                twitter: '',
                instagram: ''
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
        
        let contactInfo = '';
        if (city.staff_name) {
            contactInfo += `<p><strong>Staff:</strong> ${city.staff_name}</p>`;
        }
        if (city.email) {
            contactInfo += `<p><strong>Email:</strong> <a href="mailto:${city.email}">${city.email}</a></p>`;
        }
        if (city.website) {
            contactInfo += `<p><strong>Website:</strong> <a href="${city.website}" target="_blank">${city.website}</a></p>`;
        }
        
        let socialLinks = '';
        if (city.social.facebook) {
            socialLinks += `<a href="${city.social.facebook}" target="_blank">Facebook</a>`;
        }
        if (city.social.twitter) {
            socialLinks += `<a href="${city.social.twitter}" target="_blank">Twitter</a>`;
        }
        if (city.social.instagram) {
            socialLinks += `<a href="${city.social.instagram}" target="_blank">Instagram</a>`;
        }
        
        cityInfo.innerHTML = `
            <div class="city-details active">
                <h3>${city.name}</h3>
                ${contactInfo ? `<div class="contact-info">${contactInfo}</div>` : ''}
                ${socialLinks ? `<div class="social-links">${socialLinks}</div>` : ''}
            </div>
        `;
    }
});
</script>

<?php get_footer(); ?> 