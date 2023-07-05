import React, { useState, useEffect } from 'react';
import { View, Text, TextInput, Button, StyleSheet } from 'react-native';
import axios from 'axios';
import App from './Account';
import Account from './Account';

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
                    Account.setState(response.data);
                    console.log(Account.user);
                }
                else {
                    console.log(response.data);
                }
            }).catch(function (error) {
                console.log(error);
            });
    }

    return (
        <View style={styles.container}>
            <Text style={styles.tag}>Email:</Text>
            <TextInput style={styles.input} value={email} onChangeText={text => setEmail(text)} />
            <Text style={styles.tag}>Password:</Text>
            <TextInput style={styles.input} value={password} onChangeText={text => setPassword(text)} secureTextEntry
            />
            <View style={styles.tag}>
                <Button style={styles.button} title="SignIn" onPress={handleSignIn} />
            </View>
            <View style={styles.tag}>
                <Button style={styles.button} title="Go to SignUp" onPress={() => navigation.navigate('SignUp')} />
            </View>
        </View>
    );
};
const styles = StyleSheet.create({
    container: {
        alignItems: 'center',
        justifyContent: 'center',
    },

    tag: {
        marginTop: 20,
    },

    input: {
        borderWidth: 1,
        borderColor: 'gray',
        borderRadius: 5,
        padding: 10
    },
});

export default SignIn;
