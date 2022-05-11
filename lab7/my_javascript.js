$(document).ready(function () {
    paper.install(window);
    paper.setup("myCanvas");
    var canvas_width = $("#myCanvas").width();
    var canvas_height = $("#myCanvas").height();
    var r = 20;
    var x = Math.floor(Math.random() * (canvas_width - r)) + r;
    var y = Math.floor(Math.random() * (canvas_height - r)) + r;
    var myCircle = new paper.Path.Circle(new Point(x, y), r);
    myCircle.strokeColor = "black";
    myCircle.strokeWidth = 1;
    view.draw();
    $("#draw").click(function () {
        var x = parseInt($("#x").val());
        var y = parseInt($("#y").val());
        var r = parseInt($("#r").val());
        var strokeColor = $("#strokeColor").val();//принимает значение палитры
        var width = parseInt($("#strokeWidth").val());
        var fillColor = $("#fillColor").val();

        if (x >= (0 + r) && x <= (canvas_width - r) && y >= (0 + r) &&
            y <= (canvas_height - r) && r > 0) {
            var myCircle = new paper.Path.Circle(new Point(x, y), r);
            myCircle.strokeColor = strokeColor;
            myCircle.strokeWidth = width;
            myCircle.fillColor=fillColor;//присваивает значение из палитры
            view.draw();
        }
    });

    $("#clean").click(function () {
        paper.project.clear();
        view.draw();
    });

    $("#generator").click(function () {
        paper.project.clear();
        for (var i = 0; i < 10; i++) {
            var x = Math.floor(Math.random() * (canvas_width - r)) + r;
            var y = Math.floor(Math.random() * (canvas_height - r)) + r;
            var myCircle = new paper.Path.Circle(new Point(x, y), r);
            myCircle.strokeColor = "black";
            myCircle.strokeWidth = 1;
            myCircle.fillColor = new Color(Math.random(), Math.random(), Math.random());//объект Color, который
            //инициализируется случайными значениями для каждого канала от 0 до 1
        }
        view.draw();
    });
});