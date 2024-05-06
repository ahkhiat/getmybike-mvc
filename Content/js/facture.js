document.addEventListener("DOMContentLoaded", () => {

    let factureContainer = document.getElementById("facture_container");
    
        if(factureContainer)
        {
            console.log("facture container script chargé")

         /* -------------------------------------------------------------------------- */
         /*                          Ajout lignes sur facture                          */
         /* -------------------------------------------------------------------------- */

            let btnAjoutLigne = document.querySelector("#btn_ajout_ligne");
            let lignesContainer = document.querySelector("#all_lignes_facture_container");
            let ligneInput = document.querySelector("#ligne_facture");
            let compteurLignes = 1;

            let produits

        /* ------------- fetch produits qui arrivent en JSON sur la page ------------ */
            async function fetchProduits() {
                const res = await fetch("./api/fetch_produits.php", {
                    method: 'GET' 
                });
                produits = await res.json();
                console.log("produits :", produits);
                }
            async function getProduits() {
                await fetchProduits();
                }

        getProduits().then(() => {

            btnAjoutLigne.addEventListener("click", () => {

            /* ------------------------- container ligne facture ------------------------ */
                let ligneFactureContainer = document.createElement("div");
                    ligneFactureContainer.classList.add("d-flex")
                    ligneFactureContainer.classList.add("justify-content-between")
                    ligneFactureContainer.classList.add("mb-3")
                    ligneFactureContainer.classList.add("ligne-facture-container")
                    ligneFactureContainer.setAttribute("id", "ligne" + compteurLignes)

            /* ---------------------------------- label --------------------------------- */
                let labelLigne = document.createElement("label")
                    labelLigne.setAttribute("class", "form-label")
                    labelLigne.innerText = "Ligne facture " + compteurLignes

            /* -------------------------- menu select produits -------------------------- */
                let selectProduit = document.createElement("select")
                    selectProduit.setAttribute("class", "form-select")
                    selectProduit.setAttribute("id", "select" + compteurLignes)
                    selectProduit.setAttribute("name", `ligne[${compteurLignes}][produit]`)
                    selectProduit.classList.add("input-facture-ligne-sel")

                let defaultOption = document.createElement("option");
                    defaultOption.setAttribute("value", ""); 
                    defaultOption.textContent = "Produit"; 
                    defaultOption.setAttribute("selected", "selected"); 
                
                selectProduit.appendChild(defaultOption)


            /* ------------------ remplissage menu select avec produits ----------------- */
                produits.forEach(produit => {
                    // console.log(produit)
                    let optionSelect = document.createElement("option")
                        optionSelect.value = produit.id;
                        optionSelect.text = produit.name
                    selectProduit.appendChild(optionSelect)
                })

            /* ----------------------------- input quantité ----------------------------- */
                let selectQuantite = document.createElement("input")
                    selectQuantite.setAttribute("type", "number")
                    selectQuantite.setAttribute("placeholder", "Qté")
                    selectQuantite.setAttribute("id", "qte" + compteurLignes)
                    selectQuantite.setAttribute("name", `ligne[${compteurLignes}][quantite]`)
                    selectQuantite.classList.add("form-control")
                    selectQuantite.classList.add("input-facture-ligne-qte")

            /* ------------------------------ input prix HT ----------------------------- */
                let prixHt = document.createElement("input")
                    prixHt.setAttribute("class", "form-control")
                    prixHt.setAttribute("id", "prixHt" + compteurLignes)
                    prixHt.setAttribute("name", `ligne[${compteurLignes}][pht]`)
                    prixHt.setAttribute("placeholder", "Prix H.T.")
                    prixHt.classList.add("input-facture-ligne-ht")

            /* ------------------------------ input prix TTC ----------------------------- */
                let prixTtc = document.createElement("input")
                    prixTtc.setAttribute("class", "form-control")
                    prixTtc.setAttribute("id", "prixTtc" + compteurLignes)
                    prixTtc.setAttribute("name", `ligne[${compteurLignes}][pttc]`)
                    prixTtc.setAttribute("placeholder", "Prix T.T.C.")
                    prixTtc.classList.add("input-facture-ligne-ttc")
                

                ligneFactureContainer.appendChild(labelLigne)    
                ligneFactureContainer.appendChild(selectProduit)
                ligneFactureContainer.appendChild(selectQuantite)
                ligneFactureContainer.appendChild(prixHt)
                ligneFactureContainer.appendChild(prixTtc)

                lignesContainer.appendChild(ligneFactureContainer)

                compteurLignes++;

                let allLignesFactures = document.querySelectorAll(".ligne-facture-container")
                allLignesFactures.forEach(ligne => {
                    let menuSelect = ligne.querySelector(".input-facture-ligne-sel")
                    let prixHt = ligne.querySelector(".input-facture-ligne-ht")
                    let prixTtc = ligne.querySelector(".input-facture-ligne-ttc")
                    let qte = ligne.querySelector(".input-facture-ligne-qte")
                    

                        menuSelect.addEventListener("change", (event) => {
                            // console.log(ligne.id + " " + event.target.value)

                            let produitId = event.target.value;

                            produits.forEach(produit => {
                                if(produitId == produit.id) {
                                    // console.log(produit.price_ht)
                                    let total = 0;
                                    let prixHtValues = [];

                                    qte.addEventListener("input", (qty) => {
                                        
                                        let prixHtValue = produit.price_ht * qty.target.value;
                                        let prixTtcValue = (produit.price_ht * (1 + (produit.taux / 100))) * qty.target.value;
                                        
                                        prixHt.value = prixHtValue;
                                        prixTtc.value = prixTtcValue;

                                        // totalHt.value = parseFloat(prixHtValue);
                                      
                                         

                                    })
                                }

                            })
                            /* ------------------------- fin de produits.forEach ------------------------ */
                    
                        })
                        /* ----------------------- fin de menuSelect listenner ---------------------- */

                })
                /* ------------------------ fin de All lignes forEach ----------------------- */


            })
            /* ------------------ fin de btn ajout ligne eventListenner ----------------- */
        
            
        })
        /* ------------------------- fin de getProduits.then() ------------------------ */
        let totalHtInput = document.querySelector("#totalht")
        let totalTtcInput = document.querySelector("#totalttc")

        let btnUpdate = document.querySelector("#update")
            btnUpdate.addEventListener("click", () => {
                let allHt = document.querySelectorAll(".input-facture-ligne-ht")
                let allTtc = document.querySelectorAll(".input-facture-ligne-ttc")
                let totalHt = 0;
                let totalTtc = 0;

                    allHt.forEach(input => {
                        console.log(input.value)
                        totalHt += parseFloat(input.value) 

                        })
                    totalHtInput.value = totalHt.toString();

                    allTtc.forEach(input => {
                        totalTtc += parseFloat(input.value)
                    })
                    totalTtcInput.value = totalTtc.toString()

            })

        

        
    }
    /* ------------------------ fin de facture container ------------------------ */

})
/* -------------------------- fin de DOM container -------------------------- */


   



