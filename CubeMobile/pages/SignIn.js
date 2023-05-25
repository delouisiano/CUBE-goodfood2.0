import React, { useState } from 'react';
import { View, Text, TextInput, Button } from 'react-native';
import axios from 'axios';

const SignIn = ({ props, onSignIn, navigation }) => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');

    const handleSignIn = async () => {
        var res;
        try {
            const response = await axios.post(
                'http://apigoodfood/connexion.php',
                { mail: email, mdp: password },
                { headers: { "Content-Type": "application/json" } }
            );
            console.log(response);
            res = response;
        } catch (error) {
            console.log(error);
        }
        console.log("------------------------------")
        console.log(res.data);
        console.log("------------------------------")
        if (res.data != null) {
            onSignIn();
        } else {
            console.log("error")
        }
    };

    return (
        <View>
            <Text>Email:</Text>
            <TextInput
                value={email}
                onChangeText={text => setEmail(text)}
            />
            <Text>Password:</Text>
            <TextInput
                value={password}
                onChangeText={text => setPassword(text)}
                secureTextEntry
            />
            <Button title="SignIn" onPress={handleSignIn} />
            <Button title="Go to SignUp" onPress={() => navigation.navigate('SignIn')} />
        </View>
    );
};

export default SignIn;
