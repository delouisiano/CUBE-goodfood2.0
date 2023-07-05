import React, { useState } from 'react';
import { View, Text, TextInput, Button, StyleSheet } from 'react-native';

const SignUp = ({ navigation }) => {
    const [username, setUsername] = useState('');
    const [password, setPassword] = useState('');
    const [email, setEmail] = useState('');

    const handleSignUp = () => {
        let User = {
            pseudo: username,
            mail: email,
            mdp: password,
            Genre: "h",
            langue: 1
        };
        console.log(JSON.stringify(User));
        var apiURL = "http://api/insertAccount2.php";

        var headers = {
            'Accept': 'application/json',
            'Content-Type': 'application.json'
        };
        fetch(apiURL,
            {
                method: 'POST',
                headers: headers,
                body: JSON.stringify(User)
            })
    };

    return (
        <View style={styles.container}>
            <Text style={styles.tag}>Username:</Text>
            <TextInput style={styles.input}
                value={username}
                onChangeText={text => setUsername(text)}
            />
            <Text style={styles.tag}>Email:</Text>
            <TextInput  style={styles.input}
                value={email}
                onChangeText={text => setEmail(text)}
            />
            <Text style={styles.tag}>Password:</Text>
            <TextInput style={styles.input}
                value={password}
                onChangeText={text => setPassword(text)}
                secureTextEntry
            />
            <View style={styles.tag}>
                <Button title="Sign Up" onPress={handleSignUp} />
            </View>
            <View style={styles.tag}>
                <Button title="Go to Login" onPress={() => navigation.navigate('SignIn')} />
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

export default SignUp;
