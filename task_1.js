function isAnagram(string1, string2) {
    let str1 = string1.toLowerCase();
    let str2 = string2.toLowerCase();

    if (
        str1.length !== str2.length) {
        return false;
    }

    let sortStr1 = str1.split('').sort().join();
    let sortStr2 = str2.split('').sort().join();

    return sortStr1 === sortStr2;
}