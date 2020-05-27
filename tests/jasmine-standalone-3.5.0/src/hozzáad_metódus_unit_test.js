function hozzaad() {
    var selectBox = document.createElement("select");
    var option = document.createElement("option");

    selectBox.add(option);
    return selectBox.options.length;
}

describe("A listahoz hozzaadas metodust vizsgaljuk", () => {
    it("Hozzadva", () => {
        //ennyi elemnek kell szereplnie a listában
        var elem = 1;

        //hozzáadás metódus
        const result = hozzaad();

        //tesztelés
        expect(result).toBe(elem);
    })
});