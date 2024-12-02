<?php

namespace Database\Seeders;

use App\Admin\Models\Admin\UserModel;
use App\Admin\Models\Admin\UserPermissionModel;
use App\Admin\Models\Admin\UserRoleModel;
use App\Admin\Models\Admin\RoleModel;
use App\Admin\Models\Admin\RolePermissionModel;
use App\Admin\Models\Admin\MenuModel;
use App\Admin\Models\Admin\RoleMenuModel;
use App\Admin\Models\Admin\PermissionModel;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {

        UserModel::truncate();
        UserModel::insert(
            [
                [
                    "id" => 1,
                    "username" => "admin",
                    "password" => "\$2y\$12\$hBwS.PNVIXqHV.0s2TakV.90ImhIetdn/I6CekZtPKpEvaynFUaZW",
                    "name" => "Admin",
                    "avatar" => "https://laravel.com/img/logomark.min.svg",
                    "remember_token" => "spcxuozXKiLvArkgUGiBn3tSDmCdoibrerWTPt3MZYf1oNpxE52NwtTirPOt"
                ],
                [
                    "id" => 2,
                    "username" => "So Ka Keung",
                    "password" => "bhkEVsoJQw",
                    "name" => "So Ka Keung",
                    "avatar" => "LAQtgKloWy",
                    "remember_token" => "o4Q6wIyWya"
                ],
                [
                    "id" => 3,
                    "username" => "Shi Rui",
                    "password" => "HMy6RLJwcD",
                    "name" => "Shi Rui",
                    "avatar" => "ekbM55ViRV",
                    "remember_token" => "h0EXidv0wZ"
                ],
                [
                    "id" => 4,
                    "username" => "Terry Lopez",
                    "password" => "Mfj23t7oEo",
                    "name" => "Terry Lopez",
                    "avatar" => "wbqhNdv77H",
                    "remember_token" => "fe6Ox8EoaB"
                ],
                [
                    "id" => 5,
                    "username" => "Monica Salazar",
                    "password" => "1phDqwyAHf",
                    "name" => "Monica Salazar",
                    "avatar" => "31a8ypBtP2",
                    "remember_token" => "J4QeC3cHsB"
                ],
                [
                    "id" => 6,
                    "username" => "Sugawara Ren",
                    "password" => "V3yLwixZyy",
                    "name" => "Sugawara Ren",
                    "avatar" => "KOgkHi8SnI",
                    "remember_token" => "OBR0Xcj8aZ"
                ],
                [
                    "id" => 7,
                    "username" => "Nomura Ryota",
                    "password" => "www",
                    "name" => "www",
                    "avatar" => "www",
                    "remember_token" => "IH7owp5uAY"
                ],
                [
                    "id" => 8,
                    "username" => "Jack Morales",
                    "password" => "v6YNSStSB3",
                    "name" => "Jack Morales",
                    "avatar" => "1kDU7FIKFw",
                    "remember_token" => "xkNEd12YA5"
                ],
                [
                    "id" => 9,
                    "username" => "Matsui Sara",
                    "password" => "1wv94DvYgM",
                    "name" => "Matsui Sara",
                    "avatar" => "Ar0A9z3OVN",
                    "remember_token" => "mtyRZtbo58"
                ],
                [
                    "id" => 11,
                    "username" => "Au Wing Sze",
                    "password" => "wowow",
                    "name" => "wowow",
                    "avatar" => "wowow",
                    "remember_token" => "prfR7or12E"
                ],
                [
                    "id" => 12,
                    "username" => "Wong Sze Kwan",
                    "password" => "WDelxjtUxr",
                    "name" => "Wong Sze Kwan",
                    "avatar" => "GzdEroz3Vu",
                    "remember_token" => "WMjlTnkuoY"
                ],
                [
                    "id" => 13,
                    "username" => "Yung Lai Yan",
                    "password" => "JXNR2ZRnoX",
                    "name" => "Yung Lai Yan",
                    "avatar" => "KMTrjSCkAU",
                    "remember_token" => "n833hHXtmk"
                ],
                [
                    "id" => 14,
                    "username" => "Tao Tin Wing",
                    "password" => "4jgD4eXgvV",
                    "name" => "Tao Tin Wing",
                    "avatar" => "LWzqHoGZTe",
                    "remember_token" => "7zdGj940t6"
                ],
                [
                    "id" => 15,
                    "username" => "Douglas Murray",
                    "password" => "4elq3QTxId",
                    "name" => "Douglas Murray",
                    "avatar" => "bhI4l7dlCV",
                    "remember_token" => "ms4l6RcUs2"
                ],
                [
                    "id" => 16,
                    "username" => "Yeung Tin Wing",
                    "password" => "Ac5OP6hvyR",
                    "name" => "Yeung Tin Wing",
                    "avatar" => "RCFYPNR6Qa",
                    "remember_token" => "LU4mV5Xvjj"
                ],
                [
                    "id" => 17,
                    "username" => "Nakagawa Mai",
                    "password" => "m7FRk6feei",
                    "name" => "Nakagawa Mai",
                    "avatar" => "ADoXjtyIwD",
                    "remember_token" => "Ip4p206Pe2"
                ],
                [
                    "id" => 18,
                    "username" => "Annie Silva",
                    "password" => "dPyhNmycV5",
                    "name" => "Annie Silva",
                    "avatar" => "x0dwGpai5x",
                    "remember_token" => "QuqEyhz7uX"
                ],
                [
                    "id" => 19,
                    "username" => "Ito Sara",
                    "password" => "VcAHXjPGNz",
                    "name" => "Ito Sara",
                    "avatar" => "UEqBEdW66X",
                    "remember_token" => "KGeHmQ7UMV"
                ],
                [
                    "id" => 20,
                    "username" => "Ku Ka Fai",
                    "password" => "Ubl15oG8W1",
                    "name" => "Ku Ka Fai",
                    "avatar" => "UYJYhUtxAl",
                    "remember_token" => "cqDcHLqg94"
                ],
                [
                    "id" => 21,
                    "username" => "Sheh Hok Yau",
                    "password" => "pEo0LsZgY9",
                    "name" => "Sheh Hok Yau",
                    "avatar" => "Uzzu40VS0b",
                    "remember_token" => "Pu8Zuia16o"
                ],
                [
                    "id" => 22,
                    "username" => "Sara Moreno",
                    "password" => "BdDjmXQ0nW",
                    "name" => "Sara Moreno",
                    "avatar" => "exsbwcRUyE",
                    "remember_token" => "8xu1QLNWhQ"
                ],
                [
                    "id" => 23,
                    "username" => "Lee Tsz Hin",
                    "password" => "QHgeb5M0ra",
                    "name" => "Lee Tsz Hin",
                    "avatar" => "bg01b1S8Kt",
                    "remember_token" => "GD9CkJtmtG"
                ],
                [
                    "id" => 24,
                    "username" => "Nicholas Peterson",
                    "password" => "xMLY1L8Irt",
                    "name" => "Nicholas Peterson",
                    "avatar" => "lGTNeMQhWZ",
                    "remember_token" => "6Cc7z2QT0S"
                ],
                [
                    "id" => 25,
                    "username" => "Maeda Kazuma",
                    "password" => "4cbvsg9KID",
                    "name" => "Maeda Kazuma",
                    "avatar" => "qICXwzK3Vv",
                    "remember_token" => "O9HlaIHYhk"
                ],
                [
                    "id" => 26,
                    "username" => "Guo Shihan",
                    "password" => "7DehKGevBu",
                    "name" => "Guo Shihan",
                    "avatar" => "DnEUGh7czW",
                    "remember_token" => "KBZtwbXxEV"
                ],
                [
                    "id" => 27,
                    "username" => "Tang Ho Yin",
                    "password" => "fM8NhC5sUk",
                    "name" => "Tang Ho Yin",
                    "avatar" => "8ziwzz9igE",
                    "remember_token" => "nDcU2r1rwp"
                ],
                [
                    "id" => 28,
                    "username" => "Luo Xiuying",
                    "password" => "VAW6AqdQek",
                    "name" => "Luo Xiuying",
                    "avatar" => "MfQsJJpSW1",
                    "remember_token" => "zwjBLub4LU"
                ],
                [
                    "id" => 29,
                    "username" => "Joshua Moreno",
                    "password" => "Jie4xqKfOa",
                    "name" => "Joshua Moreno",
                    "avatar" => "SfwPY5psIM",
                    "remember_token" => "NU4AnAx3FO"
                ],
                [
                    "id" => 30,
                    "username" => "Crystal Marshall",
                    "password" => "u7WZC7zJ2t",
                    "name" => "Crystal Marshall",
                    "avatar" => "UCcfaPY93B",
                    "remember_token" => "TLzvQLk5dp"
                ],
                [
                    "id" => 31,
                    "username" => "Larry Ellis",
                    "password" => "cirirzvpGI",
                    "name" => "Larry Ellis",
                    "avatar" => "kiSYLhWvRA",
                    "remember_token" => "78Jp1e6eX5"
                ],
                [
                    "id" => 32,
                    "username" => "Kato Ikki",
                    "password" => "bFABLFgCth",
                    "name" => "Kato Ikki",
                    "avatar" => "yntDa0wIeN",
                    "remember_token" => "RhLIJE2Q3r"
                ],
                [
                    "id" => 33,
                    "username" => "Fung Tak Wah",
                    "password" => "JBRj97dXCA",
                    "name" => "Fung Tak Wah",
                    "avatar" => "ePH70b0Dob",
                    "remember_token" => "Dy8Gij30dI"
                ],
                [
                    "id" => 34,
                    "username" => "Manuel Perry",
                    "password" => "xylvHNUkVV",
                    "name" => "Manuel Perry",
                    "avatar" => "qEOw1OSXN3",
                    "remember_token" => "bTMqeyxcKk"
                ],
                [
                    "id" => 35,
                    "username" => "Don Freeman",
                    "password" => "JRb6w8nktI",
                    "name" => "Don Freeman",
                    "avatar" => "CQ3qklyZS7",
                    "remember_token" => "S4mBPtoFfe"
                ],
                [
                    "id" => 36,
                    "username" => "Sara Harris",
                    "password" => "R3kvRilmau",
                    "name" => "Sara Harris",
                    "avatar" => "Hk7PfCrhKM",
                    "remember_token" => "hO6rw9ivFR"
                ],
                [
                    "id" => 37,
                    "username" => "Harada Sakura",
                    "password" => "CuB1zYXAih",
                    "name" => "Harada Sakura",
                    "avatar" => "Y8MSy7F2rl",
                    "remember_token" => "3X2oyqkFhK"
                ],
                [
                    "id" => 38,
                    "username" => "Mo Jialun",
                    "password" => "QW9wNayqyx",
                    "name" => "Mo Jialun",
                    "avatar" => "uYQbmvownv",
                    "remember_token" => "WYwEsOgrYr"
                ],
                [
                    "id" => 39,
                    "username" => "Yeung Suk Yee",
                    "password" => "HOBMWKsDkm",
                    "name" => "Yeung Suk Yee",
                    "avatar" => "tK0rlvjQmW",
                    "remember_token" => "LVpWKAVbY1"
                ],
                [
                    "id" => 40,
                    "username" => "Yamaguchi Hana",
                    "password" => "RIxNodwhq8",
                    "name" => "Yamaguchi Hana",
                    "avatar" => "OjW6dOP4CD",
                    "remember_token" => "pciP8Ak2H3"
                ],
                [
                    "id" => 41,
                    "username" => "Tracy Reyes",
                    "password" => "OmV10NWGOT",
                    "name" => "Tracy Reyes",
                    "avatar" => "dyJeNd43th",
                    "remember_token" => "TK4pjmOA4t"
                ],
                [
                    "id" => 42,
                    "username" => "Cui Zhiyuan",
                    "password" => "8KVYkPTJR2",
                    "name" => "Cui Zhiyuan",
                    "avatar" => "CuomlKvBAo",
                    "remember_token" => "urJUxDFW5g"
                ],
                [
                    "id" => 43,
                    "username" => "Ono Kasumi",
                    "password" => "LuvLbemc2v",
                    "name" => "Ono Kasumi",
                    "avatar" => "sNVEIGXK6j",
                    "remember_token" => "9iXxSESHXI"
                ],
                [
                    "id" => 44,
                    "username" => "Ogawa Kaito",
                    "password" => "CLl1PHBm37",
                    "name" => "Ogawa Kaito",
                    "avatar" => "Ky5OMLUMht",
                    "remember_token" => "3IXJ9Fq0Ls"
                ],
                [
                    "id" => 45,
                    "username" => "Fujita Takuya",
                    "password" => "PoU1jl5VZ7",
                    "name" => "Fujita Takuya",
                    "avatar" => "4IWzCMo1fC",
                    "remember_token" => "v6RjkfTBFL"
                ],
                [
                    "id" => 46,
                    "username" => "Kwong Sze Yu",
                    "password" => "aHzzGdJj4F",
                    "name" => "Kwong Sze Yu",
                    "avatar" => "0ZeHkIR6NZ",
                    "remember_token" => "vzTK9ZtyTA"
                ],
                [
                    "id" => 47,
                    "username" => "Kwan Sze Kwan",
                    "password" => "6eSKxNQ83H",
                    "name" => "Kwan Sze Kwan",
                    "avatar" => "pTa55c58VY",
                    "remember_token" => "vklWqovymq"
                ],
                [
                    "id" => 48,
                    "username" => "Tse Ming Sze",
                    "password" => "675dWO4lGu",
                    "name" => "Tse Ming Sze",
                    "avatar" => "YpiPL8v298",
                    "remember_token" => "OeQP528klV"
                ],
                [
                    "id" => 49,
                    "username" => "Jacob Gonzalez",
                    "password" => "KL3gwd32pF",
                    "name" => "Jacob Gonzalez",
                    "avatar" => "KhrL4rPoxe",
                    "remember_token" => "lp6HdboP8M"
                ],
                [
                    "id" => 50,
                    "username" => "Ng Sum Wing",
                    "password" => "ERbf0RG0Fc",
                    "name" => "Ng Sum Wing",
                    "avatar" => "LmVEVGOLIs",
                    "remember_token" => "MRSYdo7xuX"
                ],
                [
                    "id" => 51,
                    "username" => "Harada Rena",
                    "password" => "LQeYFlfct3",
                    "name" => "Harada Rena",
                    "avatar" => "vhP303gtGM",
                    "remember_token" => "cfZ4Ca6nSh"
                ],
                [
                    "id" => 52,
                    "username" => "Shimada Yuito",
                    "password" => "SFLZl3VvO4",
                    "name" => "Shimada Yuito",
                    "avatar" => "nqgxeoIy5p",
                    "remember_token" => "eLSR1WpaGI"
                ],
                [
                    "id" => 53,
                    "username" => "Murata Rin",
                    "password" => "gTuvNWswHF",
                    "name" => "Murata Rin",
                    "avatar" => "EUMD6J2SjK",
                    "remember_token" => "Y8vWjAVrNi"
                ],
                [
                    "id" => 54,
                    "username" => "Hara Daisuke",
                    "password" => "i0sq81ZhiV",
                    "name" => "Hara Daisuke",
                    "avatar" => "gFUffAvZgR",
                    "remember_token" => "DmTOedcNLz"
                ],
                [
                    "id" => 55,
                    "username" => "Kaneko Tsubasa",
                    "password" => "FfPJ2gOaWY",
                    "name" => "Kaneko Tsubasa",
                    "avatar" => "bgJ0FecVKh",
                    "remember_token" => "oU5pscz8ta"
                ],
                [
                    "id" => 56,
                    "username" => "Carol Perry",
                    "password" => "8tu82Kkes4",
                    "name" => "Carol Perry",
                    "avatar" => "2auZ7Zrbk6",
                    "remember_token" => "1hry9aBC9l"
                ],
                [
                    "id" => 57,
                    "username" => "Chung Wai Man",
                    "password" => "UVNXdlSt0Z",
                    "name" => "Chung Wai Man",
                    "avatar" => "5MutPMPjD0",
                    "remember_token" => "qEGCIWPUXW"
                ],
                [
                    "id" => 58,
                    "username" => "Clara Clark",
                    "password" => "N7oLE4w1Lu",
                    "name" => "Clara Clark",
                    "avatar" => "j5VV1hHe2q",
                    "remember_token" => "7gY3j3H2V9"
                ],
                [
                    "id" => 59,
                    "username" => "Judy Hughes",
                    "password" => "YMsKGoZL4C",
                    "name" => "Judy Hughes",
                    "avatar" => "KkV54b6edN",
                    "remember_token" => "N1ehhwrmeI"
                ],
                [
                    "id" => 60,
                    "username" => "Yuen Wai San",
                    "password" => "FXTpWtoWoA",
                    "name" => "Yuen Wai San",
                    "avatar" => "k77m2UMuSo",
                    "remember_token" => "3x57SsEGJq"
                ],
                [
                    "id" => 61,
                    "username" => "Zhou Anqi",
                    "password" => "u4EipNOUPN",
                    "name" => "Zhou Anqi",
                    "avatar" => "cTHHz81jnN",
                    "remember_token" => "y615j3xqC8"
                ],
                [
                    "id" => 62,
                    "username" => "Cai Zitao",
                    "password" => "htYCW79hF3",
                    "name" => "Cai Zitao",
                    "avatar" => "zIBBplz2cQ",
                    "remember_token" => "gegeSZA0c6"
                ],
                [
                    "id" => 63,
                    "username" => "Sato Ren",
                    "password" => "i683EUpWdY",
                    "name" => "Sato Ren",
                    "avatar" => "SlZhoXQcQN",
                    "remember_token" => "I1QVmd2ioU"
                ],
                [
                    "id" => 64,
                    "username" => "Kevin Reynolds",
                    "password" => "hfAYUzGqfX",
                    "name" => "Kevin Reynolds",
                    "avatar" => "4di0Kq2LbU",
                    "remember_token" => "92gJAbkIYN"
                ],
                [
                    "id" => 65,
                    "username" => "To Ka Man",
                    "password" => "Er2G2gKzg1",
                    "name" => "To Ka Man",
                    "avatar" => "Sx3JWibnNh",
                    "remember_token" => "uWsjAso3Dx"
                ],
                [
                    "id" => 66,
                    "username" => "Chic Ka Keung",
                    "password" => "8mbqiSYpS1",
                    "name" => "Chic Ka Keung",
                    "avatar" => "S8b9aIl2xS",
                    "remember_token" => "mPZSOL58OL"
                ],
                [
                    "id" => 67,
                    "username" => "Wu Wing Suen",
                    "password" => "Vlz2doH1Jx",
                    "name" => "Wu Wing Suen",
                    "avatar" => "7dX5J9QPCl",
                    "remember_token" => "fA8N5jxwXh"
                ],
                [
                    "id" => 68,
                    "username" => "Matsumoto Kenta",
                    "password" => "uP64fY3xoL",
                    "name" => "Matsumoto Kenta",
                    "avatar" => "w0owpu3lli",
                    "remember_token" => "azIXmvDUMY"
                ],
                [
                    "id" => 69,
                    "username" => "Lei Jialun",
                    "password" => "tTZL9j5f5r",
                    "name" => "Lei Jialun",
                    "avatar" => "mjFlcg4itS",
                    "remember_token" => "8X1r9sydYk"
                ],
                [
                    "id" => 70,
                    "username" => "Sakurai Kasumi",
                    "password" => "izgkuYZg9i",
                    "name" => "Sakurai Kasumi",
                    "avatar" => "08YeF1FZLf",
                    "remember_token" => "nlRGPnYtrK"
                ],
                [
                    "id" => 71,
                    "username" => "Maeda Minato",
                    "password" => "8aeA9u6RCa",
                    "name" => "Maeda Minato",
                    "avatar" => "hV4CmqamUD",
                    "remember_token" => "ronzGx7aGS"
                ],
                [
                    "id" => 72,
                    "username" => "Sit Kwok Yin",
                    "password" => "IUYmc4swjn",
                    "name" => "Sit Kwok Yin",
                    "avatar" => "Rn0UsQp8sQ",
                    "remember_token" => "Rmfy36ySc5"
                ],
                [
                    "id" => 73,
                    "username" => "Thelma Young",
                    "password" => "9la1tH6WIR",
                    "name" => "Thelma Young",
                    "avatar" => "4ziRHiS8Bd",
                    "remember_token" => "kNF21pSEcz"
                ],
                [
                    "id" => 74,
                    "username" => "Yokoyama Mai",
                    "password" => "0V84OpTq68",
                    "name" => "Yokoyama Mai",
                    "avatar" => "cQTsLBRg2D",
                    "remember_token" => "FNc5B6ZrSa"
                ],
                [
                    "id" => 75,
                    "username" => "Choi Tsz Hin",
                    "password" => "imffDUbUz1",
                    "name" => "Choi Tsz Hin",
                    "avatar" => "M75tKn0fwL",
                    "remember_token" => "BQgNtUzULY"
                ],
                [
                    "id" => 76,
                    "username" => "Yoshida Hina",
                    "password" => "uz7VVO8NAh",
                    "name" => "Yoshida Hina",
                    "avatar" => "PSZm0ryLQd",
                    "remember_token" => "jqHS4qjRij"
                ],
                [
                    "id" => 77,
                    "username" => "Sakai Yuna",
                    "password" => "fmUbn4jZ6t",
                    "name" => "Sakai Yuna",
                    "avatar" => "Yj5J4KxnmN",
                    "remember_token" => "Q2DIvkKB1L"
                ],
                [
                    "id" => 78,
                    "username" => "Gong Ziyi",
                    "password" => "VVW46S5eNY",
                    "name" => "Gong Ziyi",
                    "avatar" => "ZNzPL7PU38",
                    "remember_token" => "Qc11ljsWjc"
                ],
                [
                    "id" => 79,
                    "username" => "Kudo Mio",
                    "password" => "XEFjT6XY1a",
                    "name" => "Kudo Mio",
                    "avatar" => "HbWHLGuHC8",
                    "remember_token" => "iBg2smHnNk"
                ],
                [
                    "id" => 80,
                    "username" => "Yamashita Aoshi",
                    "password" => "83lQkDk79l",
                    "name" => "Yamashita Aoshi",
                    "avatar" => "ETyRMgq4Iv",
                    "remember_token" => "QubG4cRWqJ"
                ],
                [
                    "id" => 81,
                    "username" => "Jerry Lewis",
                    "password" => "NAHRBQ7Kme",
                    "name" => "Jerry Lewis",
                    "avatar" => "bvgfyQfFPo",
                    "remember_token" => "2gzYNQAE45"
                ],
                [
                    "id" => 82,
                    "username" => "Murakami Miu",
                    "password" => "crKC11ktuh",
                    "name" => "Murakami Miu",
                    "avatar" => "MnxJUhpqxD",
                    "remember_token" => "BxZFzUZDk8"
                ],
                [
                    "id" => 83,
                    "username" => "Masuda Ayano",
                    "password" => "DPdTIaY4Zb",
                    "name" => "Masuda Ayano",
                    "avatar" => "rXx5i0QA6P",
                    "remember_token" => "SCbzmUzjxd"
                ],
                [
                    "id" => 84,
                    "username" => "Sugawara Riku",
                    "password" => "p5PmjlOnvg",
                    "name" => "Sugawara Riku",
                    "avatar" => "aTKUItb7Le",
                    "remember_token" => "pkIxhJuV74"
                ],
                [
                    "id" => 85,
                    "username" => "Nakano Hikari",
                    "password" => "XVOu6iVd1E",
                    "name" => "Nakano Hikari",
                    "avatar" => "gRKmh9F2Mr",
                    "remember_token" => "Wul9bXBQUm"
                ],
                [
                    "id" => 86,
                    "username" => "Murata Mai",
                    "password" => "7upIk44Z3q",
                    "name" => "Murata Mai",
                    "avatar" => "gT9EAfE2Dc",
                    "remember_token" => "ClWL8YRv0t"
                ],
                [
                    "id" => 87,
                    "username" => "Yang Lan",
                    "password" => "nWTyco5gtu",
                    "name" => "Yang Lan",
                    "avatar" => "UHsJTe8W34",
                    "remember_token" => "y5CnnK8tdj"
                ],
                [
                    "id" => 88,
                    "username" => "Yu Anqi",
                    "password" => "IBE5mqZ1bG",
                    "name" => "Yu Anqi",
                    "avatar" => "NoggVN9eT9",
                    "remember_token" => "mfyCAgbovq"
                ],
                [
                    "id" => 89,
                    "username" => "Russell Nguyen",
                    "password" => "olCD8NLGYr",
                    "name" => "Russell Nguyen",
                    "avatar" => "flo2mJzEQN",
                    "remember_token" => "LXYXyJ65ng"
                ],
                [
                    "id" => 90,
                    "username" => "Nomura Itsuki",
                    "password" => "H3YTlFSZTC",
                    "name" => "Nomura Itsuki",
                    "avatar" => "5aqu2Uc3jf",
                    "remember_token" => "wOoFcsi1XY"
                ],
                [
                    "id" => 91,
                    "username" => "Miyazaki Aoshi",
                    "password" => "jq2Fcfss9j",
                    "name" => "Miyazaki Aoshi",
                    "avatar" => "xF9BubzyBX",
                    "remember_token" => "rX9mhN2Hvg"
                ],
                [
                    "id" => 92,
                    "username" => "Shimizu Hikaru",
                    "password" => "O3HwZHus0d",
                    "name" => "Shimizu Hikaru",
                    "avatar" => "dsbM5ut8Kn",
                    "remember_token" => "nc2rHmMYmV"
                ],
                [
                    "id" => 93,
                    "username" => "Chan Kwok Kuen",
                    "password" => "vOWpEhgAjP",
                    "name" => "Chan Kwok Kuen",
                    "avatar" => "so9mBERMXB",
                    "remember_token" => "Hzv35hcwx2"
                ],
                [
                    "id" => 94,
                    "username" => "Angela Fisher",
                    "password" => "ihXU6hcQhh",
                    "name" => "Angela Fisher",
                    "avatar" => "LAZZrCIWFy",
                    "remember_token" => "OubapRrPkV"
                ],
                [
                    "id" => 95,
                    "username" => "Wu Chieh Lun",
                    "password" => "oIOCvjBUru",
                    "name" => "Wu Chieh Lun",
                    "avatar" => "djWMyIU3Ox",
                    "remember_token" => "sTJho1qCVC"
                ],
                [
                    "id" => 96,
                    "username" => "Emily Perry",
                    "password" => "RLHif2A7Ut",
                    "name" => "Emily Perry",
                    "avatar" => "7B2Hn8zub1",
                    "remember_token" => "2pdd7IhWi3"
                ],
                [
                    "id" => 97,
                    "username" => "Nicholas Romero",
                    "password" => "7f7lYq6ZRk",
                    "name" => "Nicholas Romero",
                    "avatar" => "WorvyTaA7D",
                    "remember_token" => "P2vyOI1M53"
                ],
                [
                    "id" => 98,
                    "username" => "Yokoyama Sakura",
                    "password" => "c3kclfoeUX",
                    "name" => "Yokoyama Sakura",
                    "avatar" => "FwBfsclWrI",
                    "remember_token" => "ga86TGv7fu"
                ],
                [
                    "id" => 99,
                    "username" => "Ma Zitao",
                    "password" => "ioTgLHyzLW",
                    "name" => "Ma Zitao",
                    "avatar" => "uq9yYGzKAw",
                    "remember_token" => "QhZdCQqEai"
                ],
                [
                    "id" => 100,
                    "username" => "Shao Yunxi",
                    "password" => "fn8pty2hH4",
                    "name" => "Shao Yunxi",
                    "avatar" => "dJhKpQombk",
                    "remember_token" => "dWIIx8gYVO"
                ],
                [
                    "id" => 101,
                    "username" => "Lui Ling Ling",
                    "password" => "AhcbkXtwOB",
                    "name" => "Lui Ling Ling",
                    "avatar" => "pwGzciocYr",
                    "remember_token" => "80BgeAxM6w"
                ],
                [
                    "id" => 102,
                    "username" => "12345",
                    "password" => "12345",
                    "name" => "",
                    "avatar" => "12345",
                    "remember_token" => ""
                ],
                [
                    "id" => 103,
                    "username" => "66666",
                    "password" => "66666",
                    "name" => "66666",
                    "avatar" => "66666",
                    "remember_token" => ""
                ],
                [
                    "id" => 104,
                    "username" => "dcasvfafdsafa",
                    "password" => "vfasvfasfvas",
                    "name" => "dvavdgv",
                    "avatar" => "vdavdavds",
                    "remember_token" => ""
                ]
            ]
        );

        UserPermissionModel::truncate();
        UserPermissionModel::insert(
            [

            ]
        );

        UserRoleModel::truncate();
        UserRoleModel::insert(
            [
                [
                    "id" => 1,
                    "user_id" => 1,
                    "role_id" => 1
                ],
                [
                    "id" => 2,
                    "user_id" => 1,
                    "role_id" => 2
                ],
                [
                    "id" => 3,
                    "user_id" => 1,
                    "role_id" => 3
                ]
            ]
        );

        RoleModel::truncate();
        RoleModel::insert(
            [
                [
                    "id" => 1,
                    "name" => "管理员",
                    "tag" => "Administrator"
                ],
                [
                    "id" => 2,
                    "name" => "服务端",
                    "tag" => "Backend"
                ],
                [
                    "id" => 3,
                    "name" => "客户端",
                    "tag" => "Frontend"
                ],
                [
                    "id" => 4,
                    "name" => "策划",
                    "tag" => "Product"
                ],
                [
                    "id" => 5,
                    "name" => "运营",
                    "tag" => "Operation"
                ]
            ]
        );

        RolePermissionModel::truncate();
        RolePermissionModel::insert(
            [
                [
                    "id" => 1,
                    "role_id" => 1,
                    "permission_id" => 1
                ],
            ]
        );

        MenuModel::truncate();
        MenuModel::insert(
            [
                [
                    "id" => 1,
                    "parent_id" => 0,
                    "type" => 1,
                    "order" => 1,
                    "title" => "仪表盘",
                    "icon" => "fa fa-dashboard",
                    "url" => "/",
                    "permission" => ""
                ],
                [
                    "id" => 2,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 2,
                    "title" => "活跃统计",
                    "icon" => "fa fa-line-chart",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 3,
                    "parent_id" => 2,
                    "type" => 1,
                    "order" => 3,
                    "title" => "实时在线人数",
                    "icon" => "fa fa-area-chart",
                    "url" => "/active-statistics/user-online",
                    "permission" => ""
                ],
                [
                    "id" => 4,
                    "parent_id" => 2,
                    "type" => 1,
                    "order" => 4,
                    "title" => "注册统计",
                    "icon" => "fa fa-area-chart",
                    "url" => "/active-statistics/user-register",
                    "permission" => ""
                ],
                [
                    "id" => 5,
                    "parent_id" => 2,
                    "type" => 1,
                    "order" => 5,
                    "title" => "登录统计",
                    "icon" => "fa fa-area-chart",
                    "url" => "/active-statistics/user-login",
                    "permission" => ""
                ],
                [
                    "id" => 6,
                    "parent_id" => 2,
                    "type" => 1,
                    "order" => 6,
                    "title" => "存活统计",
                    "icon" => "fa fa-table",
                    "url" => "/active-statistics/user-survival",
                    "permission" => ""
                ],
                [
                    "id" => 7,
                    "parent_id" => 2,
                    "type" => 1,
                    "order" => 7,
                    "title" => "每日在线时长分布",
                    "icon" => "fa fa-pie-chart",
                    "url" => "/active-statistics/daily-online-time",
                    "permission" => ""
                ],
                [
                    "id" => 8,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 8,
                    "title" => "充值统计",
                    "icon" => "fa fa-line-chart",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 9,
                    "parent_id" => 8,
                    "type" => 1,
                    "order" => 9,
                    "title" => "LTV",
                    "icon" => "fa fa-table",
                    "url" => "/charge-statistics/ltv",
                    "permission" => ""
                ],
                [
                    "id" => 10,
                    "parent_id" => 8,
                    "type" => 1,
                    "order" => 10,
                    "title" => "ARP-U",
                    "icon" => "fa fa-table",
                    "url" => "/charge-statistics/arp-u",
                    "permission" => ""
                ],
                [
                    "id" => 11,
                    "parent_id" => 8,
                    "type" => 1,
                    "order" => 11,
                    "title" => "ARP-PU",
                    "icon" => "fa fa-table",
                    "url" => "/charge-statistics/arp-pu",
                    "permission" => ""
                ],
                [
                    "id" => 12,
                    "parent_id" => 8,
                    "type" => 1,
                    "order" => 12,
                    "title" => "充值率",
                    "icon" => "fa fa-table",
                    "url" => "/charge-statistics/charge-rate",
                    "permission" => ""
                ],
                [
                    "id" => 13,
                    "parent_id" => 8,
                    "type" => 1,
                    "order" => 13,
                    "title" => "每日充值统计",
                    "icon" => "fa fa-table",
                    "url" => "/charge-statistics/charge-daily",
                    "permission" => ""
                ],
                [
                    "id" => 14,
                    "parent_id" => 8,
                    "type" => 1,
                    "order" => 14,
                    "title" => "充值排行",
                    "icon" => "fa fa-table",
                    "url" => "/charge-statistics/charge-rank",
                    "permission" => ""
                ],
                [
                    "id" => 15,
                    "parent_id" => 8,
                    "type" => 1,
                    "order" => 15,
                    "title" => "充值区间分布",
                    "icon" => "fa fa-pie-chart",
                    "url" => "/charge-statistics/charge-distribution",
                    "permission" => ""
                ],
                [
                    "id" => 16,
                    "parent_id" => 8,
                    "type" => 1,
                    "order" => 16,
                    "title" => "首充时间分布",
                    "icon" => "fa fa-pie-chart",
                    "url" => "/charge-statistics/first-charge-time-distribution",
                    "permission" => ""
                ],
                [
                    "id" => 17,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 17,
                    "title" => "数据统计",
                    "icon" => "fa fa-line-chart",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 18,
                    "parent_id" => 17,
                    "type" => 1,
                    "order" => 18,
                    "title" => "等级统计",
                    "icon" => "fa fa-bar-chart",
                    "url" => "/statistics/level",
                    "permission" => ""
                ],
                [
                    "id" => 19,
                    "parent_id" => 17,
                    "type" => 1,
                    "order" => 19,
                    "title" => "资产产出分布",
                    "icon" => "fa fa-pie-chart",
                    "url" => "/statistics/asset-produce",
                    "permission" => ""
                ],
                [
                    "id" => 20,
                    "parent_id" => 17,
                    "type" => 1,
                    "order" => 20,
                    "title" => "资产消耗分布",
                    "icon" => "fa fa-pie-chart",
                    "url" => "/statistics/asset-consume",
                    "permission" => ""
                ],
                [
                    "id" => 21,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 21,
                    "title" => "游戏数据",
                    "icon" => "fa fa-save",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 22,
                    "parent_id" => 21,
                    "type" => 1,
                    "order" => 22,
                    "title" => "玩家数据",
                    "icon" => "fa fa-user-plus",
                    "url" => "/game-table/user",
                    "permission" => ""
                ],
                [
                    "id" => 23,
                    "parent_id" => 21,
                    "type" => 1,
                    "order" => 23,
                    "title" => "配置数据",
                    "icon" => "fa fa-tags",
                    "url" => "/game-table/configure",
                    "permission" => ""
                ],
                [
                    "id" => 24,
                    "parent_id" => 21,
                    "type" => 1,
                    "order" => 24,
                    "title" => "日志数据",
                    "icon" => "fa fa-history",
                    "url" => "/game-table/log",
                    "permission" => ""
                ],
                [
                    "id" => 25,
                    "parent_id" => 21,
                    "type" => 1,
                    "order" => 25,
                    "title" => "客户端错误日志",
                    "icon" => "fa fa-warning",
                    "url" => "/game-admin/client-error-log",
                    "permission" => ""
                ],
                [
                    "id" => 26,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 26,
                    "title" => "配置管理",
                    "icon" => "fa fa-database",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 27,
                    "parent_id" => 26,
                    "type" => 1,
                    "order" => 27,
                    "title" => "配置表",
                    "icon" => "fa fa-list-ol",
                    "url" => "/configure-table",
                    "permission" => ""
                ],
                [
                    "id" => 28,
                    "parent_id" => 26,
                    "type" => 1,
                    "order" => 28,
                    "title" => "服务器配置(erl)",
                    "icon" => "fa fa-server",
                    "url" => "/configure-file/erl",
                    "permission" => ""
                ],
                [
                    "id" => 29,
                    "parent_id" => 26,
                    "type" => 1,
                    "order" => 29,
                    "title" => "客户端配置(lua)",
                    "icon" => "fa fa-desktop",
                    "url" => "/configure-file/lua",
                    "permission" => ""
                ],
                [
                    "id" => 30,
                    "parent_id" => 26,
                    "type" => 1,
                    "order" => 30,
                    "title" => "客户端配置(js)",
                    "icon" => "fa fa-tv",
                    "url" => "/configure-file/js",
                    "permission" => ""
                ],
                [
                    "id" => 31,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 31,
                    "title" => "服务器管理",
                    "icon" => "fa fa-gears",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 32,
                    "parent_id" => 31,
                    "type" => 1,
                    "order" => 32,
                    "title" => "渠道列表",
                    "icon" => "fa fa-list-ul",
                    "url" => "/server-manage/channel-list",
                    "permission" => ""
                ],
                [
                    "id" => 33,
                    "parent_id" => 31,
                    "type" => 1,
                    "order" => 33,
                    "title" => "服务器列表",
                    "icon" => "fa fa-list-ul",
                    "url" => "/server-manage/server-list",
                    "permission" => ""
                ],
                [
                    "id" => 34,
                    "parent_id" => 31,
                    "type" => 1,
                    "order" => 34,
                    "title" => "服务器调整",
                    "icon" => "fa fa-cog",
                    "url" => "/server-manage/server-tuning/index",
                    "permission" => ""
                ],
                [
                    "id" => 35,
                    "parent_id" => 31,
                    "type" => 1,
                    "order" => 35,
                    "title" => "开服",
                    "icon" => "fa fa-clone",
                    "url" => "/server-manage/open",
                    "permission" => ""
                ],
                [
                    "id" => 36,
                    "parent_id" => 31,
                    "type" => 1,
                    "order" => 36,
                    "title" => "合服",
                    "icon" => "fa fa-copy",
                    "url" => "/server-manage/merge",
                    "permission" => ""
                ],
                [
                    "id" => 37,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 37,
                    "title" => "运营管理",
                    "icon" => "fa fa-user-plus",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 38,
                    "parent_id" => 37,
                    "type" => 1,
                    "order" => 38,
                    "title" => "玩家管理",
                    "icon" => "fa fa-sliders",
                    "url" => "/operation/user-manage",
                    "permission" => ""
                ],
                [
                    "id" => 39,
                    "parent_id" => 37,
                    "type" => 1,
                    "order" => 39,
                    "title" => "玩家聊天管理",
                    "icon" => "fa fa-magic",
                    "url" => "/operation/user-chat-manage",
                    "permission" => ""
                ],
                [
                    "id" => 40,
                    "parent_id" => 37,
                    "type" => 1,
                    "order" => 40,
                    "title" => "邮件",
                    "icon" => "fa fa-envelope-o",
                    "url" => "/operation/mail",
                    "permission" => ""
                ],
                [
                    "id" => 41,
                    "parent_id" => 37,
                    "type" => 1,
                    "order" => 41,
                    "title" => "公告",
                    "icon" => "fa fa-edit",
                    "url" => "/operation/notice",
                    "permission" => ""
                ],
                [
                    "id" => 42,
                    "parent_id" => 37,
                    "type" => 1,
                    "order" => 42,
                    "title" => "维护公告",
                    "icon" => "fa fa-bullhorn",
                    "url" => "/operation/maintain-notice",
                    "permission" => ""
                ],
                [
                    "id" => 43,
                    "parent_id" => 37,
                    "type" => 1,
                    "order" => 43,
                    "title" => "举报信息",
                    "icon" => "fa fa-info-circle",
                    "url" => "/operation/impeach",
                    "permission" => ""
                ],
                [
                    "id" => 44,
                    "parent_id" => 37,
                    "type" => 1,
                    "order" => 44,
                    "title" => "敏感词",
                    "icon" => "fa fa-filter",
                    "url" => "/operation/sensitive-word-data",
                    "permission" => ""
                ],
                [
                    "id" => 45,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 45,
                    "title" => "工具",
                    "icon" => "fa fa-wrench",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 46,
                    "parent_id" => 45,
                    "type" => 1,
                    "order" => 46,
                    "title" => "SSH Key生成",
                    "icon" => "fa fa-key",
                    "url" => "/assistant/key-assistant",
                    "permission" => ""
                ],
                [
                    "id" => 47,
                    "parent_id" => 45,
                    "type" => 1,
                    "order" => 47,
                    "title" => "构造器测试",
                    "icon" => "fa fa-key",
                    "url" => "/assistant/builder-test",
                    "permission" => ""
                ],
                [
                    "id" => 48,
                    "parent_id" => 0,
                    "type" => 0,
                    "order" => 48,
                    "title" => "管理员",
                    "icon" => "fa fa-tasks",
                    "url" => "",
                    "permission" => ""
                ],
                [
                    "id" => 49,
                    "parent_id" => 48,
                    "type" => 1,
                    "order" => 49,
                    "title" => "用户",
                    "icon" => "fa fa-users",
                    "url" => "/auth/user",
                    "permission" => ""
                ],
                [
                    "id" => 50,
                    "parent_id" => 48,
                    "type" => 1,
                    "order" => 50,
                    "title" => "角色",
                    "icon" => "fa fa-user",
                    "url" => "/auth/role",
                    "permission" => ""
                ],
                [
                    "id" => 51,
                    "parent_id" => 48,
                    "type" => 1,
                    "order" => 51,
                    "title" => "权限",
                    "icon" => "fa fa-ban",
                    "url" => "/auth/permission",
                    "permission" => ""
                ],
                [
                    "id" => 52,
                    "parent_id" => 48,
                    "type" => 1,
                    "order" => 52,
                    "title" => "菜单",
                    "icon" => "fa fa-bars",
                    "url" => "/auth/menu",
                    "permission" => ""
                ],
                [
                    "id" => 53,
                    "parent_id" => 48,
                    "type" => 1,
                    "order" => 53,
                    "title" => "操作日志",
                    "icon" => "fa fa-history",
                    "url" => "/auth/log",
                    "permission" => ""
                ]
            ]
        );

        RoleMenuModel::truncate();
        RoleMenuModel::insert(
            [

            ]
        );

        PermissionModel::truncate();
        PermissionModel::insert(
            [
                [
                    "id" => 1,
                    "name" => "All permission",
                    "tag" => "*",
                    "http_method" => "",
                    "http_path" => "*"
                ],
                [
                    "id" => 2,
                    "name" => "Dashboard",
                    "tag" => "dashboard",
                    "http_method" => "GET",
                    "http_path" => "/\r\n/channel/*\r\n/server/*\r\n/reload/*"
                ],
                [
                    "id" => 3,
                    "name" => "Login",
                    "tag" => "auth.login",
                    "http_method" => "",
                    "http_path" => "/auth/login\r\n/auth/logout"
                ],
                [
                    "id" => 4,
                    "name" => "User setting",
                    "tag" => "auth.setting",
                    "http_method" => "GET,PUT",
                    "http_path" => "/auth/setting"
                ],
                [
                    "id" => 5,
                    "name" => "Auth management",
                    "tag" => "auth.management",
                    "http_method" => "",
                    "http_path" => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs"
                ]
            ]
        );
    }
}
