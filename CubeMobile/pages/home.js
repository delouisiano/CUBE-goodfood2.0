import React from 'react';
import { Text } from 'react-native';

// Define a component that renders "Hello, world!" in a <h1> tag
export default function Home({ navigation }) {
    const { currentUser } = useCurrentUser();
    if (!currentUser.isConnected) {
        navigation.navigate('Login');
    }
    return (<Text>Home</Text>)
}
