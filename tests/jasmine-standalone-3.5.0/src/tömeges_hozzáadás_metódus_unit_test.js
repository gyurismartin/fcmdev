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
        //h�ny darabot szeretn�nk hozz�adni
        var darabszam = 20;

        //met�dus megh�v�sa
        const result = tomegesadat(darabszam);
        //vizsg�lat
        expect(result).toBe(darabszam);
    })
});