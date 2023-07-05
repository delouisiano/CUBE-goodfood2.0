import React, { useState } from 'react';
import { View, Text, Image, StyleSheet, TouchableOpacity } from 'react-native';


const Account = ({ route }) => {

    state = {
        user: {}
    };

    return (
        <View style={styles.cart}>
            <Text style={styles.title}>{user.id}</Text>
            <Text style={styles.title}>{user.pseudo}</Text>
            <Text style={styles.title}>{user.mail}</Text>
            <Text style={styles.title}>{user.langue}</Text>
        </View>
    );
};


const styles = StyleSheet.create({
    cart: {
        alignItems: 'center',
        justifyContent: 'center'
    },
    title: {
        fontWeight: 'bold'
    }
});

export default Account;