
    (function(d,c) {

            let countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", 
                            "Aruba", "Australia", "Austria", "Azerbaijan", 
                            "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", 
                            "Bosnia", "Botswana", "Bouvet Island", "Brazil", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", 
                            "Cambodia", "Cameroon", "Cayman Islands", "Chad", "Chile", "China", "Christmas Island", "Colombia", "Comoros", 
                            "Congo", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", 
                            "Denmark", "Djibouti", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", 
                             "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", 
                             "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", 
                            "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", 
                            "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea", "Kuwait", "Kyrgyzstan", 
                            "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau",
                            "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte",
                            "Mexico", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", 
                            "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama",
                            "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda",
                            "Saint Lucia", "Samoa", "Saudi Arabia", "Senegal", "Sierra Leone", "Singapore",
                            "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", 
                            "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan",
                            "Tajikistan", "Tanzania", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan",
                            "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela",
                            "Vietnam", "Virgin Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe"];

            let nbateams = ["Atlanta Hawks", "Boston Celtics", "Brooklyn Nets", "Charlotte Hornets", "Chicago Bulls", "Cleveland Cavaliers",
                            "Dallas Mavericks", "Denver Nuggets", "Detroit Pistons", "GS Warriors", "Houston Rockets", "Indiana Pacers",
                            "LA Clippers", "LA Lakers", "Memphis Grizzlies", "Miami Heat", "Milwaukee Bucks", "Minnesota Timberwolves",
                            "NO Pelicans", "NY Knicks", "OC Thunder", "Orlando Magic", "Philadelphia 76ers", "Phoenix Suns",
                            "PT Blazers", "Sacramento Kings", "SA Spurs", "Toronto Raptors", "Utah Jazz", "Washington Wizards"];

            const $countries = d.getElementById('selectcountries');
            const $nbateam = d.getElementById('selectnbateams');

            for(let i=0; i<countries.length; i++){
                let option = d.createElement('option');
                    option.id = `country${i}`;
                let country = countries[i];
                    option.setAttribute('name', country);
                    option.innerHTML = countries[i];
                    $countries.appendChild(option);
            }

            for(let i=0; i<nbateams.length; i++){
                let option = d.createElement('option');
                    option.id = `nbateam${i}`;
                let nbateam = nbateams[i];
                    option.setAttribute('name', nbateam);
                    option.innerHTML = nbateams[i];
                    $nbateam.appendChild(option);
            }

        })(document, console);
