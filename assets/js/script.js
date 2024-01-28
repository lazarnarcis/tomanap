var global_user = "", global_server = "", global_letter = "";
var get_data = true;
$(document).ready(function() {
    $(document).on("click", ".btn_join_server", function() {
        let server_id = $(this).data("server-id");
        Swal.fire({
            title: 'Please enter your name',
            input: 'text',
            showCancelButton: true,
            confirmButtonText: 'OK',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed && result.value) {
              var name = result.value;
                $.ajax({
                    url: "./php/JoinServer.php",
                    type: "POST",
                    data: {
                        user: name,
                        server: server_id
                    },
                    success: function(data) {
                        if (data == "true") {
                            $(".div_tomanap").show();
                            global_user = name;
                            global_server = server_id;
                        } else {
                            Swal.fire("Warning", data, "error");
                        }
                    }
                })
            }
        });
    });
    $(window).on('beforeunload', function () {
        if (global_user && global_server) {
            $.ajax({
                url: "./php/LeaveServer.php",
                type: "POST",
                data: {
                    user: global_user,
                    server: global_server
                },
                success: function() {
                    global_user = "";
                    global_server = "";
                }
            })
        }
    });
    function ShowServers() {
        $.ajax({
            url: "./php/ShowServers.php",
            type: "POST",
            data: {
                user: global_user,
                server: global_server
            },
            success: function (data) {
                $(".data_servers").html(data);
            }
        })
    } 
    const countries = [
        "Afganistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua si Barbuda",
        "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas",
        "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgia", "Belize", "Benin",
        "Bhutan", "Bolivia", "Bosnia si Hertegovina", "Botswana", "Brazilia", "Brunei",
        "Bulgaria", "Burkina Faso", "Burundi", "Cambodgia", "Camerun", "Canada", "Capul Verde",
        "Chad", "Chile", "China", "Cipru", "Colombia", "Comore", "Congo", "Costa Rica",
        "Croatia", "Cuba", "Danemarca", "Dominica", "Republica Dominicana", "Ecuador",
        "Egipt", "El Salvador", "Eritreea", "Estonia", "Eswatini", "Etiopia", "Fiji",
        "Filipine", "Finlanda", "Franta", "Gabon", "Gambia", "Georgia", "Germania", "Ghana",
        "Grecia", "Grenada", "Guatemala", "Guineea", "Guineea-Bissau", "Guineea Ecuatoriala",
        "Guyana", "Haiti", "Honduras", "Ungaria", "Islanda", "India", "Indonezia", "Iran",
        "Iraq", "Irlanda", "Israel", "Italia", "Jamaica", "Japonia", "Iordania", "Kazahstan",
        "Kenya", "Kiribati", "Coreea de Nord", "Coreea de Sud", "Kuweit", "Kirghizstan", "Laos",
        "Letonia", "Liban", "Lesotho", "Liberia", "Libia", "Liechtenstein", "Lituania",
        "Luxemburg", "Madagascar", "Malawi", "Malaezia", "Maldive", "Mali", "Malta",
        "Insulele Marshall", "Mauritania", "Mauritius", "Mexic", "Micronezia", "Moldova",
        "Monaco", "Mongolia", "Muntenegru", "Maroc", "Mozambic", "Myanmar", "Namibia",
        "Nauru", "Nepal", "Tarile de Jos", "Noua Zeelanda", "Nicaragua", "Niger", "Nigeria",
        "Macedonia de Nord", "Norvegia", "Oman", "Pakistan", "Palau", "Panama", "Papua Noua Guinee",
        "Paraguay", "Peru", "Filipine", "Polonia", "Portugalia", "Qatar", "Romania", "Rusia",
        "Rwanda", "Saint Kitts si Nevis", "Santa Lucia", "Saint Vincent si Grenadine",
        "Samoa", "San Marino", "Sao Tome si Principe", "Arabia Saudita", "Senegal", "Serbia",
        "Seychelles", "Sierra Leone", "Singapore", "Slovacia", "Slovenia", "Insulele Solomon",
        "Somalia", "Africa de Sud", "Sudanul de Sud", "Spania", "Sri Lanka", "Sudan", "Surinam",
        "Suedia", "Elvetia", "Siria", "Taiwan", "Tajikistan", "Tanzania", "Thailanda", "Timorul de Est",
        "Togo", "Tonga", "Trinidad si Tobago", "Tunisia", "Turcia", "Turkmenistan", "Tuvalu",
        "Uganda", "Ucraina", "Emiratele Arabe Unite", "Marea Britanie", "Statele Unite ale Americii",
        "Uruguay", "Uzbekistan", "Vanuatu", "Vatican", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
    ];
    
    ShowServers();
    setInterval(ShowServers, 1000);

    $(document).on("click", ".click_stop", async function() {
        let user_error = 0;
        //check city
        // const apiKey = 'lnarcis310';
        const cityName = $(".input_city").val();
        // const apiUrl = `http://api.geonames.org/searchJSON?q=${encodeURIComponent(cityName)}&maxRows=1&featureClass=P&username=${apiKey}`;
        // await fetch(apiUrl)
        //     .then(response => response.json())
        //     .then(data => {
        //         if (data.geonames && data.geonames.length > 0 && cityName.toLowerCase()[0] == global_letter.toLowerCase()) {
        //         console.log(`Orașul ${cityName} există.`);
        //         $(".input_city").removeClass("is-invalid");
        //         } else {
        //         console.log(`Orașul ${cityName} nu a fost găsit.`);
        //         $(".input_city").addClass("is-invalid");
        //         user_error=1;
        //         }
        //     })
        //     .catch(error => console.error('Eroare la căutarea orașului:', error));

        if (cityName.toLowerCase()[0] == global_letter.toLowerCase()) {
            console.log(`Orașul ${cityName} există.`);
            $(".input_city").removeClass("is-invalid");
        } else {
            console.log(`Orașul ${cityName} nu a fost găsit.`);
            $(".input_city").addClass("is-invalid");
            user_error=1;
        }

        //check country
        let countryName = $(".input_country").val().toLowerCase();
        if (!countries.map(country => country.toLowerCase()).includes(countryName) || countryName.toLowerCase()[0] != global_letter.toLowerCase()) {
            console.log(`Tara ${countryName} nu există.`);
            $(".input_country").addClass("is-invalid");
            user_error=1;
        } else {
            console.log(`Tara ${countryName} există.`);
            $(".input_country").removeClass("is-invalid");
        }

        //check mountain
        const mountainName = $(".input_mountain").val();  
        // const apiUrlMountain = `http://api.geonames.org/searchJSON?q=${encodeURIComponent(mountainName)}&featureClass=T&maxRows=1&username=${apiKey}`;

        // await fetch(apiUrlMountain)
        // .then(response => response.json())
        // .then(data => {
        //     if (data.geonames && data.geonames.length > 0 && mountainName.toLowerCase()[0] == global_letter.toLowerCase()) {
        //     console.log(`Muntele ${mountainName} există.`);
        //     $(".input_mountain").removeClass("is-invalid");
        //     } else {
        //     console.log(`Muntele ${mountainName} nu a fost găsit.`);
        //     $(".input_mountain").addClass("is-invalid");
        //     user_error=1;
        //     }
        // })
        // .catch(error => console.error('Eroare la căutarea muntelui:', error));

        if (mountainName.toLowerCase()[0] == global_letter.toLowerCase()) {
            console.log(`Muntele ${mountainName} există.`);
            $(".input_mountain").removeClass("is-invalid");
        } else {
            console.log(`Muntele ${mountainName} nu a fost găsit.`);
            $(".input_mountain").addClass("is-invalid");
            user_error=1;
        }

        //check water
        const riverName = $(".input_water").val();
        // const apiUrlWater = `http://api.geonames.org/searchJSON?q=${encodeURIComponent(riverName)}&featureClass=H&maxRows=1&username=${apiKey}`;

        // await fetch(apiUrlWater)
        // .then(response => response.json())
        // .then(data => {
        //     if (data.geonames && data.geonames.length > 0 && riverName.toLowerCase()[0] == global_letter.toLowerCase()) {
        //     console.log(`Râul ${riverName} există.`);
        //     $(".input_water").removeClass("is-invalid");
        //     } else {
        //     console.log(`Râul ${riverName} nu a fost găsit.`);
        //     $(".input_water").addClass("is-invalid");
        //     user_error=1;
        //     }
        // })
        // .catch(error => console.error('Eroare la căutarea râului:', error));

        if (riverName.toLowerCase()[0] == global_letter.toLowerCase()) {
            console.log(`Râul ${riverName} există.`);
            $(".input_water").removeClass("is-invalid");
        } else {
            console.log(`Râul ${riverName} nu a fost găsit.`);
            $(".input_water").addClass("is-invalid");
            user_error=1;
        }

        //check name
        const apiKeyName = 'AIzaSyAzYDUwsYzak1Ge0W2kwkN0YBGU9QMBSXo';
        const cx = '12b845fde0b0242db'; 
        const nameToCheck = $(".input_name").val();
        const apiUrlName = `https://www.googleapis.com/customsearch/v1?q=${encodeURIComponent(nameToCheck)}+person&key=${apiKeyName}&cx=${cx}`;
        
        await fetch(apiUrlName)
          .then(response => response.json())
          .then(data => {
            if (data.items && data.items.length > 0 && nameToCheck.toLowerCase()[0] == global_letter.toLowerCase()) {
              console.log(`Numele "${nameToCheck}" pare să existe în rezultatele căutării.`);
                $(".input_name").removeClass("is-invalid");
            } else {
              console.log(`Numele "${nameToCheck}" nu a putut fi găsit în rezultatele căutării.`);
            $(".input_name").addClass("is-invalid");
            user_error=1;
            }
          })
          .catch(error => console.error('Eroare la căutarea numelui:', error));

        //check animal
        const apiUrlAnimal = 'https://api.thecatapi.com/v1/breeds';
        const animalName = $(".input_animal").val();

        // await fetch(apiUrlAnimal)
        // .then(response => response.json())
        // .then(data => {
        //     const calExists = data.some(breed => breed.name.toLowerCase() === animalName.toLowerCase());

        //     if (calExists) {
        //     console.log(`Informații despre ${animalName} au fost găsite.`);
                // $(".input_animal").removeClass("is-invalid");
                //     } else {
        //     console.log(`Nu s-au găsit informații despre ${animalName}.`);
            // $(".input_animal").addClass("is-invalid");
            //     user_error=1;//aici tre sa modific
        //     }
        // })
        // .catch(error => console.error('Eroare la căutarea informațiilor despre animal:', error));

        if (animalName.toLowerCase()[0] == global_letter.toLowerCase()) {
            $(".input_animal").removeClass("is-invalid");
        } else {
            $(".input_animal").addClass("is-invalid");
            user_error=1;
        }

        //check plant
        if ($(".input_plant").val().toLowerCase()[0] == global_letter.toLowerCase()) {
            $(".input_plant").removeClass("is-invalid");
        } else {
            $(".input_plant").addClass("is-invalid");
            user_error=1;
        }

        if(user_error == 0) { //problems here
            let data_ajax = "&user=" + global_user + "&server=" + global_server;
            $.ajax({
                url: "./php/StopServer.php",
                type: "POST",
                data: data_ajax,
                success: function (data) {
                    data = JSON.parse(data);
                    if(data) checkStoppedGame();
                }
            });
        } else {
            Swal.fire("Error", "completeaza tot", "error");
        }
    });

    function callStopGame() {
        let data_ajax = $("#tomanap_form").serialize() + "&user=" + global_user + "&server=" + global_server;
        $.ajax({
            url: "./php/AddUserToServerGame.php",
            type: "POST",
            data: data_ajax,
            success: function (data) {
            }
        });
    }

    function getGeneratedLetter() {
        if (global_server) {
            $.ajax({
                url: "./php/GetGeneratedLetter.php",
                type: "POST",
                data: {
                    server:global_server
                },
                success: function (data) {
                    data = JSON.parse(data);
                    $("#hereLetter").text(`Tomanap cu litera ${data.letter}!`);
                    $("#showLetter").show();
                    global_letter = data.letter;
                }
            });
        }
    }
    getGeneratedLetter();
    setInterval(getGeneratedLetter, 500);

    function checkStoppedGame() {
        $.ajax({
            url: "./php/CheckStoppedGame.php",
            type: "POST",
            data: {
                server: global_server
            },
            success: function (data) {
                if (data) {
                    data = JSON.parse(data);
                    if (data.length) {
                        if(data[0].stopped == 1 || data[0].stopped == "1") {
                            $(".input_country").prop("readonly", true);
                            $(".input_city").prop("readonly", true);
                            $(".input_mountain").prop("readonly", true);
                            $(".input_water").prop("readonly", true);
                            $(".input_name").prop("readonly", true);
                            $(".input_animal").prop("readonly", true);
                            $(".input_plant").prop("readonly", true);

                            $("#game-stopped").show();
                            $(".view-score").show();
                            $("#game-stopped").text(`Joc oprit de ${data[0].stopped_by} (doar ${data[0].stopped_by} poate porni din nou jocul!)`);
                            $(".click_stop").attr("disabled", true);
                            if (get_data == true) {
                                callStopGame();
                                get_data = false;
                            }
                        }
                    }
                }
            }
        })
    }
    setInterval(checkStoppedGame, 1000);

    function addNewRow(data_to_add) {
        new DataTable('#tableScores').row
            .add(data_to_add)
            .draw(false);
    }

    $(document).on("click", '.view-score', function() {
        $("#modalScores").modal("show");
        $.ajax({
            url: "./php/GetServerScores.php",
            type: "POST", 
            data: {
                server: global_server
            },
            dataType: "json",
            success: function(data) {
                let table = new DataTable('#tableScores');
                table.clear();
                if (data && data.length) {
                    for (let p =0 ; p < data.length; p++) {
                        addNewRow(data[p]);
                    }
                }
                table.draw();
            }
        });
    });
});