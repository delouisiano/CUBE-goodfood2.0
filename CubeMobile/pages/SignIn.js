import React, { useState, useEffect } from 'react';
import { View, Text, TextInput, Button } from 'react-native';
import axios from 'axios';

const SignIn = ({ props, onSignIn, navigation }) => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    const handleSignIn = async () => {
        const params = new URLSearchParams();
        params.append('email', email);
        params.append('password', password);

        var data;
        await axios.post('http://api/SignIn.php', params)
            .then(function (response) {
                data = response.data;
                if (data != "") {
                    onSignIn();
                }
            }).catch(function (error) {
                console.log(error);
            });
    }

    return (
        <View>
            <Text>Email:</Text>
            <TextInput value={email} onChangeText={text => setEmail(text)} />
            <Text>Password:</Text>
            <TextInput
                value={password}
                onChangeText={text => setPassword(text)}
                secureTextEntry
            />
            <Button title="SignIn" onPress={handleSignIn} />
            <Button
                title="Go to SignUp"
                onPress={() => navigation.navigate('SignUp')}
            />
        </View>
    );
};

export default SignIn;
