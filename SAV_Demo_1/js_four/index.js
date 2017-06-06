/**
 * Created by Tian on 2017/4/27.
 */

function errorInformation(id) {
    console.log('entererreur');
    if ( document.getElementById(id).classList.contains('has-success') )
        document.getElementById(id).classList.remove('has-success');
    document.getElementById(id).classList.add('has-error');
}

function successInformation(id) {
    console.log('entersucess');
    if ( document.getElementById(id).classList.contains('has-error'))
        document.getElementById(id).classList.remove('has-error');
    document.getElementById(id).classList.add('has-success');
}
