class Logement {
    reference;
    type;
    surface;
    telephone;
    prix;
    adresse;
    /**
     * @param {string} reference - The unique reference of the logement.
     * @param {string} type - The type of the logement (e.g., apartment, house).
     * @param {number} surface - The surface area of the logement in square meters.
     * @param {string} telephone - The contact telephone number for the logement.
     * @param {number} prix - The price of the logement.
     * @param {string} adresse - The address of the logement.
     */
    constructor(reference, type, surface, telephone, prix, adresse) {
        this.reference = reference;
        this.type = type;
        this.surface = surface;
        this.telephone = telephone;
        this.prix = prix;
        this.adresse = adresse;
    }

}

L1 = new Logement("L1", "appartement", 50, "0123456789", 500, "10 rue de Paris");
L2 = new Logement("L2", "maison", 100, "0987654321", 1000, "20 avenue de Lyon");
console.log(L1.reference)