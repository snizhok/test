<h1>
    Задание 4
</h1>

<p style="font-style: italic">
    Разработать javascript-функцию преобразования числа в его текстовое представление (26 => “двадцать
    шесть”), входящее число находится в диапазоне 1..9999.
</p>

<p>
    <label>Введите число, которое находится в диапазоне 1..9999</label><br>
    <input type="text" value="" onchange="getNumberString(this.value)"><br>
</p>
<p class="result"></p>

<script>

    function getNumberString(n) {
        if (n != parseInt(n) || n > 9999 || n < 1) {
            alert("Введите число, которое находится в диапазоне 1..9999");
            return;
        }

        var arr = [
            ["ноль", "один", "два", "три", "четыре", "пять", "шесть",
                "семь", "восемь", "девять", "десять", "одиннадцать",
                "двенадцать", "тринадцать", "четырнадцать", "пятнадцать",
                "шестнадцать", "семнадцать", "восемнадцать", "девятнадцать"],

            ["", "", "двадцать", "тридцать", "сорок", "пятьдесят", "шестьдесят",
                "семьдесят", "восемьдесят", "девяносто"],

            ["", "сто", "двести", "триста", "четыреста", "пятьсот", "шестьсот",
                "семьсот", "восемьсот", "девятьсот"],
            ["", "тысяча", "две тысячи", "три тысячи", "четыре тысячи", "пять тысяч", "шесть тысяч",
                "семь тысяч", "восемь тысяч", "девять тысяч"]
        ];

        var symbols = n.split("");
        var string = '';
        switch (symbols.length) {
            case 4:
                string += arr[3][symbols[0]];
                if (symbols[1] > 0)
                    string += ' ' + arr[2][symbols[1]];
                if (symbols[2] > 0)
                    string += ' ' + arr[1][symbols[2]];
                if (symbols[3] > 0)
                    string += ' ' + arr[0][symbols[3]];
                break;
            case 3:
                string += arr[2][symbols[0]];
                if (symbols[1] > 0)
                    string += ' ' + arr[1][symbols[1]];
                if (symbols[2] > 0)
                    string += ' ' + arr[0][symbols[2]];
                break;
            case 2:
                string += arr[1][symbols[0]];
                if (symbols[1] > 0)
                    string += ' ' + arr[0][symbols[1]];
                break;
            default:
                string += arr[0][symbols[0]];
                break;
        }
        alert(string);
    }

</script>
