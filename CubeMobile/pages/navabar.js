import { StyleSheet, View, Text, Image, Button } from 'react-native';
import React, { useState, useEffect } from 'react';
import axios from 'axios';


// Define the main component that renders the cards in grid
export default function Navbar({ navigation }) {

    return (
        <View style={styles.content}>
            <Text>Navbar</Text>
        </View>
    );
};

// Define some styles for the components
const styles = StyleSheet.create({
    content: {
        marginBottom: "0%",
        backgroundColor: '#000',

    }
});