        <div class="w-[80%] flex flex-row justify-start gap-[24px]">
            <button id="atk-btn" class="w-16 h-16 rounded-full bg-red-700 shadow-[0_0_20px_hsl(190,80%,60%)] flex items-center justify-center text-white font-bold font-family-manrope active:translate-y-1 transition-all">Q</button>
            
            <?php
            if ($hero instanceof Guerrier) { ?>
                <button id="rage-btn" class="w-16 h-16 rounded-full bg-orange-700 shadow-[0_0_20px_hsl(190,80%,60%)] flex items-center justify-center text-white font-bold font-family-manrope active:translate-y-1 transition-all">S</button>
            <?php
            }
            ?>

            <?php
            if ($hero instanceof Magician) { ?>
                <button id="mana-btn" class="w-16 h-16 rounded-full bg-blue-700 shadow-[0_0_20px_hsl(190,80%,60%)] flex items-center justify-center text-white font-bold font-family-manrope active:translate-y-1 transition-all">D</button>

            <?php
            }
            ?>
        </div>