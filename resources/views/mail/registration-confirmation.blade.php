
                <div class="registration-info">
                    <div class="field">Name</div><div class="value">{{ name }}</div>
                </div>
                <div class="registration-info">
                    <div class="field">Email</div><div class="value">{{ email }}</div>
                </div>

                <p>You have registered for the following information events</p>

                <ul>
                    <transition-group name="list">
                        <li v-for="event in selectedEvents"
                            key="event.id"    
                        ><span class="bold">{{ event.title }}</span> {{ event.date }}<br /> {{ event.location }}</li>
                    </transition-group>
                </ul>

                <p>A member of our admissions team will be following up with you closer to the event. Should you have any questions feel free to contact us at <span class="bold">admissions@brentwood.bc.ca</span></p>
