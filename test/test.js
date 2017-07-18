var assert=require('assert');
var user=require('../model/user.js');

describe('user',function(){
    describe('#login',function(){
        it('retorna true',function(){
            assert.ok(user.login('jsday','jsday'))
        })
    })
})