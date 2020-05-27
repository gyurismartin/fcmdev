function removes(selected) {
    var selectBox = document.createElement("select");
    for (i = 0; i < 5; i++) {
        var option = document.createElement("option");
        selectBox.add(option);
    }
    selectBox.remove(selectBox.options[selected].index);
    return selectBox.options.length;
}

describe("Torles a listabol", () => {
    it("Kitoroljuk", () => {
        //kiválasztott index a listában
        var selected = 2;

        //törlés metódus
        const result = removes(selected);

        //tesztelés
        expect(result).toBe(4);
    })
});