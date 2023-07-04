import React, { useState, useEffect } from 'react';
import { View, Text, TextInput, Button } from 'react-native';
import axios from 'axios';

const SignIn = ({ props, onSignIn, navigation }) => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    const handleSignIn = async () => {
        const params = new URLSearchParams();
        params.append('mail', email);
        params.append('mdp', password);

        await axios.post('http://apigoodfood/connexion.php', params)
            .then(function (response) {
                if (response.data.id) {
                    onSignIn();
                }
                else {
                    console.log(response.data);
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
