function tomegesadat(darabszam) {
    var selectBox = document.createElement("select");
    window.segedtabla = new Array();
    for (var i = 0; i < darabszam; i++) {
        var option = document.createElement("option");
        var kezdeti = new Array();
        selectBox.add(option);
        window.segedtabla.splice(window.segedtabla.length, 0, kezdeti);
    }
    return selectBox.options.length;
}

describe("Tomeges adatbevitel vizsgalata", () => {
    it("A lista feltoltese sikeres", () => {
        //hány darabot szeretnénk hozzáadni
        var darabszam = 20;

        //metódus meghívása
        const result = tomegesadat(darabszam);
        //vizsgálat
        expect(result).toBe(darabszam);
    })
});