
// validate phone no. in js

/**
 * If the input is not a number, return false. If the input is a number, check if it's 10 digits long.
 * If it is, return true. If it's not, return false.
 * @param x - The number to be validated.
 */

function validate_num(x){
    if (isNaN(x)) {
        return false;
    } 
    else {
        if(x.toString().length == 10){
            return true;
        }else {
            return false;
        }
    }
}



/**
 * If the input is not a number, return false. If the input is a number, check if the length of the
 * number is equal to the second argument. If it is, return true. If it isn't, return false.
 * @param x - The value to be validated.
 * @param y - The length of the OTP
 */
function validate_otp(x , y){
    if (isNaN(x)) {
        return false;
    } 
    else {
        if(x.toString().length == y){
            return true;
        }else {
            return false;
        }
    }
}