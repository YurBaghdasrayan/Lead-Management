<template>
    <div>
        <p v-if="isVerified">Your email is verified.</p>
        <p v-else>Please verify your email by clicking on the link we sent to your inbox.</p>
        <!-- Add more user-friendly messages or actions here -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            isVerified: false,
        };
    },
    mounted() {
        this.checkEmailVerification();
    },
    methods: {
        async checkEmailVerification() {
            try {
                const response = await axios.get('/api/user'); // Or another endpoint that returns user data
                this.isVerified = response.data.email_verified_at !== null;
            } catch (error) {
                console.error('Error checking email verification:', error);
            }
        },
    },
};
</script>
