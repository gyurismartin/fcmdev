function removes(selected) {
    var selectBox = document.getElementById("select");
    selectBox.remove(selectBox.options[selected].index);
    return selectBox.options.length;
}
function hozzaad() {
    var selectBox = document.getElementById("select");
    var option = document.createElement("option");

    selectBox.add(option);
    return selectBox.options.length;
}

describe("Hozzadas a listahoz, majd torles onnan.", () => {
    beforeAll(function () {
        var body = document.getElementsByTagName("body")[0];
        //5 elemû lista létrehozása
        var selectBox = document.createElement("select");
        selectBox.setAttribute("id", "select");
        for (i = 0; i < 5; i++) {
            var option = document.createElement("option");
            selectBox.add(option);
        }
        body.appendChild(selectBox);
    });
    it("Hozzadva", () => {
        //hozzáadás metódus
        const result1 = hozzaad();

        //tesztelés
        expect(result1).toBe(6);
    });
    it("Kitorolve", () => {
        //kiválasztott index a listában
        var selected = 2;

        //törlés metódus
        const result = removes(selected);

        //tesztelés
        expect(result).toBe(5);
    });
    afterAll(function () {
        document.getElementById("select").remove();
    })
});
