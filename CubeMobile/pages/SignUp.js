import React, { useState } from 'react';
import { View, Text, TextInput, Button } from 'react-native';

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
        <View>
            <Text>Username:</Text>
            <TextInput
                value={username}
                onChangeText={text => setUsername(text)}
            />
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
            <Button title="Sign Up" onPress={handleSignUp} />
            <Button title="Go to Login" onPress={() => navigation.navigate('SignIn')} />
        </View>
    );
};

export default SignUp;
