function hozzaad() {
    var selectBox = document.createElement("select");
    var option = document.createElement("option");

    selectBox.add(option);
    return selectBox.options.length;
}

describe("A listahoz hozzaadas metodust vizsgaljuk", () => {
    it("Hozzadva", () => {
        //ennyi elemnek kell szereplnie a list�ban
        var elem = 1;

        //hozz�ad�s met�dus
        const result = hozzaad();

        //tesztel�s
        expect(result).toBe(elem);
    })
});